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

namespace PHPDataGen;

use PhpParser\NodeVisitorAbstract;
use PhpParser\Node as PHPNode;
use PhpParser\Comment;

/**
 * PHP walker
 *
 * @author Eridan Domoratskiy <eridan200@mail.ru>
 */
class PHPWalker extends NodeVisitorAbstract {

    /**
     * @var string Collected code
     */
    protected $code = '';

    /**
     * @var Node\File File node
     */
    protected $node;

    public function __construct(?Node\File $node = null) {
        $this->node = $node ?? new Node\File();
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getNode(): Node\File {
        return $this->node;
    }

    public function leaveNode(PHPNode $node) {
        if (is_a($node, PHPNode\Stmt\Namespace_::class, false)) {
            $this->node->namespace = $node->name;
        }

        if (is_a($node, PHPNode\Stmt\Use_::class, false)) {
            $this->node->uses[] = new PHPNode\Stmt\Use_($node->uses, $node->type);
        }

        foreach ($node->getComments() as $comment) {
            $text = $comment->getText();

            // Matches "/**pdgl " on start of comment in any case
            if (preg_match('#^/\*\*pdgl\s#i', $text) !== 1) {
                return;
            }

            $this->code .= substr($text, 7, strlen($text) - 9);
        }
    }
}
