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

namespace PHPDataGen\PDGL;

use PhpParser\ParserFactory;
use PhpParser\Node;

use PHPDataGen\Model;
use PHPDataGen\Type;

/**
 * This is an automatically GENERATED file, which should not be manually edited.
 *
 * Based on prototype file of PHP parser
 * written by Masato Bito
 *
 * @author Eridan Domoratskiy
 * @author Masato Bito
 */
class Parser extends \Kmyacc\AbstractParser {

    const YYBADCH = 42;
    const YYMAXLEX = 272;
    const YYTERMS = 42;
    const YYNONTERMS = 33;

    const YYLAST = 108;

    const YY2TBLSTATE = 18;

    const YYGLAST = 17;

    const YYSTATES = 133;
    const YYNLSTATES = 56;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   21,   42,   42,   28,   33,   39,   42,
           26,   27,   31,   34,   16,   35,   36,   32,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   22,   18,
           38,   23,   37,   17,   30,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   24,   15,   25,   40,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   19,   41,   20,   29,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,    1,    2,    3,    4,
            5,    6,    7,    8,   42,    9,   10,   11,   42,   12,
           13,   14
    ];

    protected $yyaction = [
           63,   64,   65,   66,   58,   59,   60,  156,  157,   57,
          112,  171,  115,  126,  120,   20,  116,   55,  143,   41,
          144,   42,  121,  122,  123,  124,  125,  127,  128,   21,
           43,   44,   22,   23,   45,   24,   15,   25,   46,   26,
           58,   59,   60,   52,  163,   57,   63,   64,   65,   66,
          107,  108,  162,   99,  154,  148,   34,  151,   53,  155,
           11,  -25,  153,  158,  106,   33,   10,   85,  152,   51,
            0,   50,  100,  101,    6,    8,   78,  172,   80,   89,
           48,   12,   13,  167,    9,    0,    0,    0,    0,   76,
            0,    0,   54,    0,    0,    0,    7,    0,   49,  159,
          161,  160,  164,  166,  165,  168,  170,  169
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,   23,   23,   11,
           12,   13,   14,   15,   18,   17,   20,   19,   34,   21,
           35,   23,   24,   25,   26,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
            6,    7,    8,   23,   23,   11,    2,    3,    4,    5,
            9,   10,   23,    6,   17,   23,   11,   37,   38,   22,
           15,    0,   41,   23,   23,    2,    3,   20,   39,   37,
            0,   31,    7,    8,    5,    4,   14,   13,   18,   21,
           23,   15,   15,   37,   16,   -1,   -1,   -1,   -1,   17,
           -1,   -1,   19,   -1,   -1,   -1,   22,   -1,   23,   23,
           23,   23,   23,   23,   23,   23,   23,   23
    ];

    protected $yybase = [
            0,   -4,   -2,   -2,   -2,   44,   45,   45,   45,   45,
           34,   34,   34,   34,   41,   20,   47,   60,   63,   65,
           37,   40,  -16,  -15,   32,   29,   21,   61,   71,   69,
           74,   62,   70,   58,   66,   67,   73,   67,   68,   67,
           72,   57,   75,   76,   77,   78,   79,   64,   80,   81,
           82,   83,   46,   84,    0,    0,    0,   -2,    0,    0,
            0,   34,   34,   34,   34,   34,    0,    0,    0,    0,
            0,    0,    0,   62
    ];

    protected $yydefault = [
           26,32767,32767,   49,   63,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,   48,   81,   42,   21,32767,32767,
        32767,   74,   77,   78,   80,   82,   84,   30,   34,   36,
           46,   21,32767,   32,    1,   14,32767,   15,   37,   16,
           19,   73,   85,   75,   76,   79,   83,   57,   94,   93,
           86,   90,   91,   89,   38,   61
    ];

    protected $yygoto = [
           62,   62,   62,   62,   62,   40,   91,   74,    3,   61,
          110,  110,   69,   37,   39,   67,    2
    ];

    protected $yygcheck = [
            2,    2,    2,    2,    2,    7,    7,    7,   27,    2,
           28,   28,    2,    6,    6,    4,   10
    ];

    protected $yygbase = [
            0,    0,   -1,    0,   10,    0,    2,   -2,    0,    0,
          -15,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    6,    7,    0,
            0,    0,    0
    ];

    protected $yygdefault = [
        -32768,   32,   68,   28,  111,   30,   35,   73,   38,  103,
           79,   97,   27,   83,   84,   18,   29,   36,   16,   87,
           95,   96,   19,    5,   14,   17,   31,    4,  109,   47,
          114,    1,  118
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    7,    8,    8,    9,
            9,   10,   10,   11,   11,    1,   12,   12,   13,   14,
           15,   15,   19,   19,   16,   16,   17,   17,   18,   18,
           20,   21,   22,   22,   23,   23,   24,   24,   25,   25,
           26,   26,   26,   27,   27,   28,   28,   28,   28,   28,
           28,   31,   31,   32,   32,   30,   30,   30,   30,   30,
           30,   30,   30,   30,   30,   30,   30,   30,   30,   30,
           30,   30,   30,   30,   30,   30,   30,   30,   30,   30,
           30,   30,   30,   30,   30,   30,   30,   30,   30,   30,
           30,   30,   30,   30,   30,   30,   30,   30,   30,   30,
           30,   30,   30,   30,   30,   29,   29
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    3,    1,    3,    1,
            2,    0,    1,    1,    1,    1,    0,    2,    1,    8,
            0,    2,    1,    2,    0,    2,    0,    2,    0,    2,
            1,    6,    0,    1,    1,    1,    0,    2,    0,    3,
            1,    1,    1,    1,    2,    1,    1,    1,    1,    1,
            3,    0,    2,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    3,
            3,    3,    3,    3,    3,    1,    2
    ];

    public function __construct(\JLexPHP\AbstractLexer $lexer) {
        parent::__construct($lexer);
    }

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
            0 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            1 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            2 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            3 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            4 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            5 => function ($yysp) {
                 $this->yyval = new Node\Identifier($this->yyastk[$yysp - (1 - 1)]); 
            },
            6 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            7 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            8 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            9 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            10 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            11 => function ($yysp) {
                 $this->yyval = new Node\Identifier($this->yyastk[$yysp - (1 - 1)]); 
            },
            12 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            13 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            14 => function ($yysp) {
                 $this->yyval = new Node\Name($this->yyastk[$yysp - (1 - 1)]); 
            },
            15 => function ($yysp) {
                 $this->yyval = new Node\Name\FullyQualified($this->yyastk[$yysp - (2 - 2)]); 
            },
            16 => function ($yysp) {
                
            // Hack for emulate T_NAMESPACE token

            if (strtolower($this->yyastk[$yysp - (3 - 1)]) === 'namespace') {
                $this->yyval = new Node\Name\Relative($this->yyastk[$yysp - (3 - 3)]);
            } else {
                $this->yyval = new Node\Name(array_merge([$this->yyastk[$yysp - (3 - 1)]], $this->yyastk[$yysp - (3 - 3)]));
            }
        
            },
            17 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            18 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            19 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (1 - 1)], false); 
            },
            20 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (2 - 1)], true); 
            },
            21 => function ($yysp) {
                 $this->yyval = ''; 
            },
            22 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            23 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            24 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            25 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            26 => function ($yysp) {
                 $this->yyval = []; 
            },
            27 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            28 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            29 => function ($yysp) {
                
            $this->yyval = new Model\Class_([
                'name' => $this->yyastk[$yysp - (8 - 3)],

                'flags' => $this->yyastk[$yysp - (8 - 1)],

                'extends'    => $this->yyastk[$yysp - (8 - 4)],
                'implements' => $this->yyastk[$yysp - (8 - 5)],

                'fields' => $this->yyastk[$yysp - (8 - 7)]
            ]);
        
            },
            30 => function ($yysp) {
                 $this->yyval = 0; 
            },
            31 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            32 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL; 
            },
            33 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL_FINAL; 
            },
            34 => function ($yysp) {
                 $this->yyval = null; 
            },
            35 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            36 => function ($yysp) {
                 $this->yyval = []; 
            },
            37 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            38 => function ($yysp) {
                 $this->yyval = []; 
            },
            39 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            40 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            41 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => $this->yyastk[$yysp - (6 - 3)],

                'flags' => $this->yyastk[$yysp - (6 - 1)] | $this->yyastk[$yysp - (6 - 2)] | $this->yyastk[$yysp - (6 - 5)]['assign'],

                'type' => $this->yyastk[$yysp - (6 - 4)],

                'default' => is_null($this->yyastk[$yysp - (6 - 5)]['value'])?
                    null: static::parseDefval($this->yyastk[$yysp - (6 - 5)]['value'])
            ]);

            $this->lexer->sendGaps = false;
        
            },
            42 => function ($yysp) {
                 $this->yyval = 0; 
            },
            43 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_DIRECT; 
            },
            44 => function ($yysp) {
                 $this->yyval = 0; 
            },
            45 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_EDITABLE; 
            },
            46 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            47 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            48 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            49 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            50 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Model\Field::FLAG_FILTER_DEFAULT; 
            },
            51 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            52 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Model\Field::FLAG_DIRECT_DEFINING; 
            },
            53 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            55 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            56 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            57 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            58 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            59 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            60 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            61 => function ($yysp) {
                 $this->yyval = ''; 
            },
            62 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            63 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            64 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            65 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            66 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            67 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            68 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            69 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            70 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            71 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            72 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            73 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            74 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            75 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            76 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            77 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            78 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            79 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            80 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            81 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            82 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            83 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            84 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            85 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            86 => function ($yysp) {
                 $this->yyval = "**"; 
            },
            87 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            88 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            89 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            90 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            91 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            92 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            93 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            94 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            95 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            96 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            97 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            98 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            99 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            100 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            101 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            102 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            103 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            104 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            105 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            106 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            107 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            108 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            109 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            110 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            111 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            112 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            113 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            114 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            115 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            116 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
        ];
    }

    public static function applyFlag(int $flags, int $flag): int {
        if ($flags & $flag) {
            $this->yyerror('Flag has already set');
        }

        return $flags | $flag;
    }

    public static function parseDefval(string $value): Node\Expr {
        static $parser = null;

        if (is_null($parser)) {
            $parser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        }

        return $parser->parse("<?php $value;")[0]->expr;
    }
}
