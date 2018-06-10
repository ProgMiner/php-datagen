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
 * Parser
 */
class Parser {

    /**
     * Reads namespace (Foo\Bar\Baz sequence) from parser conveyor
     * Shifts parser coveyor on namespace length
     *
     * @param &string $next Parser conveyor string
     *
     * @return string Namespace
     */
    public static function readNamespace(string &$next): string {
        if (preg_match('/^[a-z_][\w\\]*\w/i', $next, $matches) === 1) {
            $next = substr($next, strlen($matches[0]));

            return $matches[0];
        }

        throw new \Exception('Namespace not found');
    }

    /**
     * Reads class name from parser conveyor
     * Shifts parser coveyor on class name length
     *
     * @param &string $next Parser conveyor string
     *
     * @return string Class name
     */
    public static function readClassname(string &$next): string {
        if (preg_match('/^[a-z_]\w*/i', $next, $matches) === 1) {
            $next = substr($next, strlen($matches[0]));

            return $matches[0];
        }

        throw new \Exception('Class name not found');
    }

    /**
     * Reads extended class name (\Foo\Bar\Baz sequence or regular) from parser conveyor
     * Shifts parser coveyor on extended class name length
     *
     * @param &string $next Parser conveyor string
     *
     * @return string Extended class name
     */
    public static function readExtendedClassname(string &$next): string {
        if (preg_match('/^(\\[a-z_]\w*)+/i', $next, $matches) === 1) {
            $next = substr($next, strlen($matches[0]));

            return $matches[0];
        }

        return static::readClassname($next);
    }

    /**
     * Reads semicolon from parser conveyor
     * Shifts parser coveyor on one symbol
     *
     * @param &string $next Parser conveyor string
     */
    public static function readSemicolon(string &$next) {
        if (strpos($next, ';') === 0) {
            return;
        }

        throw new \Exception('Semicolon not found');
    }
}
