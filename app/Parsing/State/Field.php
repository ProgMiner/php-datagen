<?php

/* MIT License

Copyright (c) 2018 Eridan Domoratskiy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. */

namespace PHPDataGen\Parsing\State;

use PhpParser\ParserFactory;
use PhpParser\Node;

use PHPDataGen\Parsing;
use PHPDataGen\Builder;

/**
 * Field parsing state
 *
 * @author Eridan Domoratskiy <eridan200@mail.ru>
 */
class Field implements Parsing\State {

    /**
     * @var Parsing\State Parent state
     */
    protected $parent = null;

    /**
     * @var Builder\Field Builder
     */
    protected $builder = null;

    /**
     * @var int Current file parsing state
     *
     * 0 - Direct
     * 1 - Val/var
     * 2 - Field name
     * 3 - After field name
     * 4 - Type name
     * 5 - After type name
     * 6 - Validator
     * 7 - Extended default value
     * 8 - Default value
     *
     */
    protected $state = 0;

    /**
     * @param Parsing\State $parent Parent state
     */
    public function __construct(Parsing\State $parent) {
        $this->builder = new Builder\Field();
        $this->parent = $parent;
    }

    public function getBuilder(): Builder\Field {
        return $this->builder;
    }

    protected static function parseValue(string $value): Node\Expr {
        $value = "<?php $value;";

        $parser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        $ret = $parser->parse($value);

        return $ret[0]->expr;
    }

    public function step(Parsing\Conveyor $conveyor): Parsing\State {
        switch ($this->state) {
        case 0:
            if ($conveyor->readOperator('direct')) {
                $this->builder->setDirect();

                return $this;
            }

            $this->state = 1;
            return $this;

        case 1:
            $this->state = 2;

            if ($conveyor->readOperator('val')) {
                return $this;
            }

            if ($conveyor->readOperator('var')) {
                $this->builder->setEditable();

                return $this;
            }

            throw $conveyor->makeException('val/var operator expected');

        case 2:
            $this->builder->setName($conveyor->readName());

            $this->state = 3;
            return $this;

        case 3:
            if ($conveyor->readOperator('=')) {
                $this->state = 7;
                return $this;
            }

            if ($conveyor->readOperator('<=')) {
                $this->builder->setDirectDefining();

                $this->state = 8;
                return $this;
            }

            if ($conveyor->readOperator(':=')) {
                $this->builder->setNotFilterDefault();

                $this->state = 7;
                return $this;
            }

            if ($conveyor->readOperator(':')) {
                $this->state = 4;
                return $this;
            }

            $conveyor->readSemicolon();

            $this->parent->step($conveyor);
            return $this->parent;

        case 4:
            $this->builder->setType($conveyor->readType());

            $this->state = 5;
            return $this;

        case 5:
            if ($conveyor->readOperator(',')) {
                $this->state = 6;
                return $this;
            }

            $this->state = 3;
            return $this;

        case 6:
            $this->builder->addValidator($conveyor->readName());

            $this->state = 5;
            return $this;

        case 7:
            $matches = [];

            $fail = false;
            if ($conveyor->readOperator('```')) {
                if (preg_match('/^([\\s\\S]*?)```/', $conveyor, $matches) !== 1) {
                    $fail = true;
                }
            } elseif ($conveyor->readOperator('`')) {
                if (preg_match('/^(.*?)`/', $conveyor, $matches) !== 1) {
                    $fail = true;
                }
            } else {
                $this->state = 8;
                return $this;
            }

            if ($fail) {
                throw $conveyor->makeException('Error occured while default value parsing');
            }

            $conveyor->move(strlen($matches[0]));
            $this->builder->setDefault(static::parseValue($matches[1]));

            $this->state = 3;
            return $this;

        case 8:
            $matches = [];

            // TODO Option for using direct defining by default

            if (preg_match('/^([\\s\\S]*?);/', $conveyor, $matches) !== 1) {
                throw $conveyor->makeException('Semicolon after default value expected');
            }

            $matches[0] = substr($matches[0], 0, strlen($matches[1]));
            $conveyor->move(strlen($matches[0]));
            $this->builder->setDefault(static::parseValue($matches[1]));

            $this->state = 3;
            return $this;

        }
    }
}
