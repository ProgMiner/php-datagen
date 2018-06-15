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

namespace PHPDataGen\Parsing;

use PHPDataGen\Exception\ParsingException;

/**
 * Parsing conveyor
 */
class Conveyor {

    /**
     * @var string Source string
     */
    protected $source = null;

    /**
     * @var string Next string
     */
    protected $next = null;

    /**
     * @var int Next string length
     */
    protected $length = 0;

    /**
     * @var int Current cursor row
     */
    protected $row = 0;

    /**
     * @var int Current cursor column
     */
    protected $column = 0;

    /**
     * @param string $source Source of conveyor
     */
    public function __construct(string $source) {
        $this->source = $source;
        $this->next = $source;

        $this->length = strlen($source);
    }

    /**
     * Returns next string length
     *
     * @return int
     */
    public function length(): int {
        return $this->length;
    }

    public function makeException(string $description, int $code = 0, \Throwable $previous = null): ParsingException {
        $offset = strlen($this->source) - $this->length;

        for (; $offset > 0; --$offset) {
            // TODO Configurable newline symbol
            if ($this->source[$offset] === "\n") {
                ++$offset;
                break;
            }
        }

        $line = substr($this->source, $offset);
        $line = substr($line, 0, strpos($line, "\n"));

        return new ParsingException($description, $line, $this->row, $this->column, $code, $previous);
    }

    /**
     * Moves conveyor on specified offset.
     * Offset must be pozitive (or null)
     *
     * @param int $offset Pozitive offset
     */
    public function move(int $offset) {
        if ($offset < 0) {
            throw new \OutOfRangeException("Offset must be pozitive");
        }

        for ($i = 0; $i < $offset; ++$i) {
            if ($this->next[$i] == "\n") {
                $this->column = 0;
                ++$this->row;
            } else {
                ++$this->column;
            }
        }

        $this->next = substr($this->next, $offset);
        $this->length -= $offset;
    }

    /**
     * Tries to read operator.
     * If required is true throws Exception
     *
     * @param string $operator Operator
     * @param bool   $skip     Skip operator? Default is true
     * @param bool   $required Is operator required? Default is false
     *
     * @return Operator finded
     */
    public function readOperator(string $operator, bool $skip = true, bool $required = false): bool {
        if (strpos($this->next, $operator) === 0) {
            if ($skip) {
                $this->move(strlen($operator));
            }

            return true;
        }

        if ($required) {
            throw $this->makeException("\"$operator\" expected");
        }

        return false;
    }

    /**
     * Moves conveyor to next not-space symbol
     */
    public function skipSpaces() {
        if (preg_match('/^\\s*/', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));
        }
    }

    /**
     * Skips comment if exists
     */
    public function skipComment() {
        if (preg_match('/^\\/\\*[\\s\\S]*\\*\\//', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));
        }

        if (preg_match('/^\\/\\/.*/', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));
        }
    }

    /**
     * Reads namespace (Foo\Bar\Baz sequence) from parser conveyor
     * Shifts parser coveyor on namespace length
     *
     * @return string Namespace
     */
    public function readNamespace(): string {
        if (preg_match('/^[a-z_][\\w\\\\]*\\w/i', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));

            return $matches[0];
        }

        throw $this->makeException("Namespace expected");
    }

    /**
     * Reads class name from parser conveyor
     * Shifts parser coveyor on class name length
     *
     * @return string Class name
     */
    public function readName(): string {
        if (preg_match('/^[a-z_]\\w*/i', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));

            return $matches[0];
        }

        throw $this->makeException("Name expected");
    }

    /**
     * Reads extended class name (\Foo\Bar\Baz sequence or regular) from parser conveyor
     * Shifts parser coveyor on extended class name length
     *
     * @return string Extended class name
     */
    public function readExtendedClassname(): string {
        if (preg_match('/^(\\\\[a-z_]\\w*)+/i', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));

            return $matches[0];
        }

        try {
            return $this->readName();
        } catch (ParseException $e) {
            throw $this->makeException("Class name expected", 0, $e);
        }
    }

    /**
     * Reads semicolon from parser conveyor
     * Shifts parser coveyor on one symbol
     */
    public function readSemicolon() {
        if ($this->readOperator(';')) {
            return;
        }

        throw $this->makeException("Semicolon expected");
    }

    public function __toString() {
        return $this->next;
    }
}
