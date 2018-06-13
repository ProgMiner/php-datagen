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

/**
 * Parsing conveyor
 */
class Conveyor {

    /**
     * @var string Next string
     */
    protected $next = null;

    /**
     * @var int Next string length
     */
    protected $length = 0;

    /**
     * @var int Current cursor line
     */
    protected $line = 0;

    /**
     * @var int Current cursor row
     */
    protected $row = 0;

    /**
     * @param string $source Source of conveyor
     */
    public function __construct(string $source) {
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
                $this->row = 0;
                ++$this->line;
            } else {
                ++$this->row;
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
     * @param bool   $required Is operator required? Default is false
     *
     * @return Operator finded
     */
    public function readOperator(string $operator, bool $required = false): bool {
        if (strpos($this->next, $operator) === 0) {
            $this->move(strlen($operator));
            return true;
        }

        if ($required) {
            // TODO Parsing exception class
            throw new \Exception("$operator not found at {$this->line} line {$this->row} row");
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

        throw new \Exception('Namespace not found');
    }

    /**
     * Reads class name from parser conveyor
     * Shifts parser coveyor on class name length
     *
     * @return string Class name
     */
    public function readClassname(): string {
        if (preg_match('/^[a-z_]\\w*/i', $this->next, $matches) === 1) {
            $this->move(strlen($matches[0]));

            return $matches[0];
        }

        throw new \Exception('Class name not found');
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

        return $this->readClassname();
    }

    /**
     * Reads semicolon from parser conveyor
     * Shifts parser coveyor on one symbol
     */
    public function readSemicolon() {
        if ($this->readOperator(';')) {
            return;
        }

        throw new \Exception('Semicolon not found');
    }

    public function __toString() {
        return $this->next;
    }
}