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

namespace PHPDataGen\Utility;

/**
 * Extracts directory path, filename, file extension from file path
 *
 * Return object contains 3 fields:
 *   - dirname   - Directory path
 *   - filename  - String before first dot in basename
 *   - extension - String after first dot in basename
 *
 * @param string $path
 *
 * @return \stdClass
 */
function _pathInfo(string $path): \stdClass {
    $ret = (object) [];

    $info = pathinfo($path);
    $dot = strpos($info['basename'], '.');

    $ret->dirname = $info['dirname'];
    $ret->extension = substr($info['basename'], $dot + 1);
    $ret->filename = substr($info['basename'], 0, $dot);

    return $ret;
}
