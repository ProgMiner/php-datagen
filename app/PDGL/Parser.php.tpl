<?php

// vim: syntax=php

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

$meta #
#semval($) $this->yyval
#semval($,%t) $this->yyval
#semval(%n) $this->yyastk[$yysp - (%l - %n)]
#semval(%n,%t) $this->yyastk[$yysp - (%l - %n)]
namespace PHPDataGen\PDGL;

use PhpParser\ParserFactory;
use PhpParser\Node as PHPNode;

use PHPDataGen\Node;
use PHPDataGen\Type;
#include;

/**
 * This is an automatically GENERATED file, which should not be manually edited.
 *
 * Based on prototype file of PHP parser
 * written by Masato Bito
 *
 * @author Eridan Domoratskiy
 * @author Masato Bito
 */
class #(-p) extends \Kmyacc\AbstractParser {

    const YYBADCH = #(YYBADCH);
    const YYMAXLEX = #(YYMAXLEX);
    const YYTERMS = #(YYTERMS);
    const YYNONTERMS = #(YYNONTERMS);

    const YYLAST = #(YYLAST);

    const YY2TBLSTATE = #(YY2TBLSTATE);

    const YYGLAST = #(YYGLAST);

    const YYSTATES = #(YYSTATES);
    const YYNLSTATES = #(YYNLSTATES);
    const YYINTERRTOK = #(YYINTERRTOK);
    const YYUNEXPECTED = #(YYUNEXPECTED);
    const YYDEFAULT = #(YYDEFAULT);

    protected $yytranslate = [
        #listvar yytranslate
    ];

    protected $yyaction = [
        #listvar yyaction
    ];

    protected $yycheck = [
        #listvar yycheck
    ];

    protected $yybase = [
        #listvar yybase
    ];

    protected $yydefault = [
        #listvar yydefault
    ];

    protected $yygoto = [
        #listvar yygoto
    ];

    protected $yygcheck = [
        #listvar yygcheck
    ];

    protected $yygbase = [
        #listvar yygbase
    ];

    protected $yygdefault = [
        #listvar yygdefault
    ];

    protected $yylhs = [
        #listvar yylhs
    ];

    protected $yylen = [
        #listvar yylen
    ];

    public function __construct(\JLexPHP\AbstractLexer $lexer) {
        parent::__construct($lexer);
#if -t
        $this->yydebug = true;

        $this->yyterminals = [
            #listvar terminals
            , "???"
        ];

        $this->yyproduction = [
            #production-strings;
        ];
#endif
    }
#if -t
    public function yytokname($n) {
        switch ($n) {
            #switch-for-token-name;
        default:
            return "???";
        }
    }
#endif

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
#reduce
            %n => function ($yysp) {
                %b
            },
#noact
            %n => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
#endreduce
        ];
    }
#tailcode;
}
