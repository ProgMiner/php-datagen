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

namespace PHPDataGen\Exception;

/**
 * Parsing exception
 */
class ParsingException extends \Exception {

    /**
     * @var string Description of caused exception
     */
    protected $description = null;

    /**
     * @var string Line that caused exception
     */
    protected $line = 0;

    /**
     * @var int Column number of line that caused exception
     */
    protected $column = 0;

    /**
     * @var int Row number of line that caused exception
     */
    protected $row = 0;

    /**
     * @param string     $description Description of caused exception
     * @param string     $line        Line that caused exception
     * @param int        $row         Row number of line that caused exception
     * @param int        $column      Column number of line that caused exception
     * @param int        $code        Exception code
     * @param \Throwable $previous    Previous exception
     */
    public function __construct(
        string     $description,
        string     $line,
        int        $row,
        int        $column,
        int        $code     = 0,
        \Throwable $previous = null
    ) {
        $this->description = $description;
        $this->line = $line;

        $this->column = $column;
        $this->row = $row;

        $msg = "$description at row $row, column $column:\n$line\n";
        for ($i = 0; $i < $column; ++$i) {
            $msg .= ' ';
        }
        $msg .= '^';

        parent::__construct($msg, $code, $previous);
    }
}
