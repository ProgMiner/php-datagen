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
use PhpParser\Node as PHPNode;

use PHPDataGen\Node;
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

    const YYBADCH = 49;
    const YYMAXLEX = 278;
    const YYTERMS = 49;
    const YYNONTERMS = 57;

    const YYLAST = 135;

    const YY2TBLSTATE = 31;

    const YYGLAST = 58;

    const YYSTATES = 205;
    const YYNLSTATES = 98;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   31,   49,   49,   36,   40,   46,   49,
           27,   28,   38,   41,   23,   42,   43,   39,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   33,   25,
           45,   32,   44,   24,   26,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   34,   22,   35,   47,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   29,   48,   30,   37,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,   49,   49,   49,   49,
           49,   49,   49,   49,   49,   49,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           49,   15,   16,   17,   18,   19,   20,   21
    ];

    protected $yyaction = [
          105,  106,  107,  108,  100,  101,  102,  181,  -40,  248,
          -74,  173,  174,  175,   61,   99,  194,  195,  259,  198,
          211,  221,   33,  238,  213,    3,  160,    1,   13,   74,
           34,   21,    4,  -39,  210,  212,   35,   75,   76,   36,
           27,   77,   37,   28,   38,   78,   39,  100,  101,  102,
          105,  106,  107,  108,  189,  190,   87,  249,   99,  244,
          243,    0,   83,  234,   15,   85,   20,  240,  237,   88,
          230,  188,  252,  239,  251,   86,  241,  242,  121,  182,
          183,   19,   90,  135,  260,  150,  229,   23,   12,  -68,
          119,   14,   18,  255,   16,    0,   53,   89,    0,  117,
            0,  121,  209,    0,    0,   45,    0,  130,  199,    0,
           92,    0,  -67,  -46,   93,   94,  201,    0,  159,    0,
           82,  178,  245,  247,  246,  250,  254,  253,  256,  258,
          257,    0,    0,    0,  200
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    6,    0,   32,
            9,   10,   11,   12,    2,   17,   18,   19,   20,   21,
           22,   23,   24,   46,   26,   27,   14,   29,    5,   31,
           32,    9,   34,    0,   36,   37,   38,   39,   40,   41,
           42,   43,   44,   45,   46,   47,   48,    6,    7,    8,
            2,    3,    4,    5,   15,   16,   32,   32,   17,   32,
           32,    0,   32,   32,    4,   38,    3,   24,   44,   45,
           42,   32,   44,   48,   44,   44,   33,   32,   25,    7,
            8,   13,   29,   17,   20,   18,   41,   22,   26,   30,
           21,   33,   22,   44,   23,   -1,   23,   23,   -1,   24,
           -1,   25,   25,   -1,   -1,   27,   -1,   28,   28,   -1,
           29,   -1,   30,   30,   30,   30,   30,   -1,   31,   -1,
           32,   32,   32,   32,   32,   32,   32,   32,   32,   32,
           32,   -1,   -1,   -1,   35
    ];

    protected $yybase = [
           33,   77,   77,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   48,   70,   70,   70,   70,   70,    1,   41,   41,
           41,   41,   41,   41,   68,   53,   39,   28,   24,   76,
           76,   12,   72,   43,   30,   27,   45,   31,  -23,   25,
           82,    8,   59,   83,   62,   66,   62,   62,   89,   89,
           62,   78,   60,   66,   23,   58,   69,   69,   69,   61,
           65,   87,   63,   65,   81,   84,   79,   73,   22,   85,
           74,   71,   75,   67,   88,   90,   91,   92,   93,   64,
           80,   86,   94,   95,   99,   96,   97,   49,   98,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,   -2,
           -2,    0,    0,    0,    0,    0,    0,    0,    0,   41,
           41,   41,   41,   41,   41,    0,    0,    0,    0,    0,
            0,    0,   12,   69,    0,    0,    0,   69,   69
    ];

    protected $yydefault = [
           24,  106,  107,  104,  104,32767,32767,   79,  105,  110,
           89,32767,32767,32767,32767,32767,32767,   82,32767,32767,
        32767,32767,32767,32767,   56,   20,   88,  121,  125,   20,
           20,   57,32767,32767,  129,  117,  120,  124,  126,  128,
           24,   24,   24,   24,   25,   33,   25,   25,   78,   51,
           26,   31,   63,32767,   65,   86,   20,   20,   20,32767,
           14,   60,32767,   15,32767,32767,32767,   34,32767,32767,
           47,   66,   18,32767,  116,  118,  119,  122,  127,   98,
        32767,32767,  138,  137,32767,  130,  134,  135,  133,   24,
           24,   24,   24,   24,   24,   24,   24,   24
    ];

    protected $yygoto = [
           46,  207,   46,   47,  110,  110,  110,  110,  110,   84,
          110,  103,  103,  103,  103,  111,    8,    8,    7,   10,
           63,  192,  192,  192,  192,  114,   72,  162,  115,   52,
           48,   49,    5,   73,    6,   96,   97,   17,   22,  109,
          168,  157,  140,   57,  147,  126,  134,    0,    0,   47,
           40,  152,   43,  151,  143,  148,  171,  179
    ];

    protected $yygcheck = [
           12,   56,   12,   12,    2,    2,    2,    2,    2,   53,
            2,    2,    2,    2,    2,    2,   44,   44,   44,   44,
            6,   50,   50,   50,   50,    7,    7,    7,    7,    3,
            3,    3,   10,   10,   10,   11,   11,   13,   13,    4,
           39,   37,   23,   30,   28,   15,   20,   -1,   -1,   12,
           12,   12,   12,   12,   12,   12,   12,   12
    ];

    protected $yygbase = [
            0,    0,   -8,    9,   28,    0,    2,   12,    0,    0,
          -24,    6,  -40,   -9,    0,   -5,    0,    0,    0,    0,
           -7,    0,    0,    1,    0,    0,    0,    0,  -45,    0,
           -6,    0,    0,    0,    0,    0,    0,   10,    0,   -2,
            0,    0,    0,    0,   13,    0,    0,    0,    0,    0,
           14,    0,    0,    5,    0,    0,   -1
    ];

    protected $yygdefault = [
        -32768,   59,  104,   64,  193,   55,   60,  128,   71,  185,
          120,   91,   44,   24,   50,  125,   51,  127,   66,   67,
          133,  136,   41,  139,  141,  142,   69,   70,  146,   95,
           56,   25,   65,   62,   54,  153,   31,  156,   42,  167,
          169,  170,   68,   29,    9,   32,   11,   26,   30,   58,
          191,   79,  197,   80,   81,    2,  206
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    8,    8,    9,    9,
           10,   10,   11,   11,   12,   13,   13,   14,   14,   15,
           16,   17,   17,   18,   18,   19,   19,   20,    1,   21,
           21,   22,   22,   23,   23,   25,   26,   26,   27,   27,
           28,   29,   29,   24,   24,   31,   33,   33,   36,   36,
           37,   37,   37,   34,   34,   35,   35,   32,   32,   38,
           38,   39,   39,   41,   42,   42,   42,   42,   43,   43,
           30,   40,   45,   45,   46,   46,   47,   47,   48,   48,
           49,   49,   49,   44,   44,   50,   50,   50,   50,   50,
           50,   50,   50,   50,   53,   53,   54,   54,   55,   55,
           56,   56,   52,   52,   52,   52,   52,   52,   52,   52,
           52,   52,   52,   52,   52,   52,   52,   52,   52,   52,
           52,   52,   52,   52,   52,   52,   52,   52,   52,   52,
           52,   52,   52,   52,   52,   52,   52,   52,   52,   52,
           52,   52,   52,   52,   52,   52,   52,   52,   52,   52,
           52,   51,   51
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    1,    3,    1,    2,
            0,    1,    1,    1,    0,    0,    1,    1,    2,    3,
            1,    0,    3,    0,    1,    1,    3,    1,    1,    0,
            1,    1,    2,    1,    1,    9,    0,    1,    1,    3,
            5,    0,    3,    6,    3,    7,    0,    1,    1,    2,
            1,    2,    1,    0,    2,    0,    2,    0,    1,    1,
            2,    1,    1,    8,    0,    1,    1,    1,    0,    3,
            1,    9,    0,    1,    1,    1,    0,    2,    0,    3,
            1,    1,    1,    1,    2,    1,    1,    1,    1,    1,
            1,    3,    3,    3,    0,    1,    0,    1,    1,    2,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    3,    3,    3,    3,    3,
            3,    1,    2
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
                 $this->yyval = new PHPNode\Identifier($this->yyastk[$yysp - (1 - 1)]); 
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
                 $this->yyval = new PHPNode\Identifier($this->yyastk[$yysp - (1 - 1)]); 
            },
            12 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            13 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            14 => function ($yysp) {
                
            // Hack for emulate T_NAMESPACE token

            if (strtolower($this->yyastk[$yysp - (1 - 1)][0]) === 'namespace') {
                array_unshift($this->yyastk[$yysp - (1 - 1)]);
                $this->yyval = new PHPNode\Name\Relative($this->yyastk[$yysp - (1 - 1)]);
            } else {
                $this->yyval = new PHPNode\Name($this->yyastk[$yysp - (1 - 1)]);
            }
        
            },
            15 => function ($yysp) {
                 $this->yyval = new PHPNode\Name\FullyQualified($this->yyastk[$yysp - (2 - 2)]); 
            },
            16 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            17 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            18 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (1 - 1)], false); 
            },
            19 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (2 - 1)], true); 
            },
            20 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            21 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            22 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            23 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            24 => function ($yysp) {
                
            // TODO
            // $$ = $this->lexer->getComments();

            $this->yyval = $this->getComments();
        
            },
            25 => function ($yysp) {
                 $this->yyval = []; 
            },
            26 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            27 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            28 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            29 => function ($yysp) {
                
            $this->yyval = new Node\Annotation([
                'name'      => $this->yyastk[$yysp - (3 - 2)],
                'arguments' => $this->yyastk[$yysp - (3 - 3)]
            ]);
        
            },
            30 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            31 => function ($yysp) {
                 $this->yyval = []; 
            },
            32 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 2)]; 
            },
            33 => function ($yysp) {
                 $this->yyval = []; 
            },
            34 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            35 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            36 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            37 => function ($yysp) {
                 $this->yyval = new PHPNode\Scalar\String_($this->yyastk[$yysp - (1 - 1)]); 
            },
            38 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            39 => function ($yysp) {
                 $this->yyval = []; 
            },
            40 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            41 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            42 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            43 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            44 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            45 => function ($yysp) {
                
            $this->yyval = new Node\Enum([
                'name' => $this->yyastk[$yysp - (9 - 4)],

                'consts' => $this->yyastk[$yysp - (9 - 7)],

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (9 - 1)],
                    'annotations' => $this->yyastk[$yysp - (9 - 2)]
                ]
            ]);
        
            },
            46 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            47 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (1 - 1)]; 
            },
            48 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            49 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            50 => function ($yysp) {
                
            $this->yyval = new Node\Const_([
                'name' => $this->yyastk[$yysp - (5 - 3)],

                'flags' => 0,

                'value' => is_null($this->yyastk[$yysp - (5 - 4)])?
                    null: static::parsePHP($this->yyastk[$yysp - (5 - 4)]),

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (5 - 1)],
                    'annotations' => $this->yyastk[$yysp - (5 - 2)]
                ]
            ]);

            $this->lexer->sendGaps = false;
        
            },
            51 => function ($yysp) {
                 $this->yyval = null; 
            },
            52 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 3)]; 
            },
            53 => function ($yysp) {
                
            $this->yyval = (function($class, $stmts) {
                foreach ($stmts as $stmt) {
                    if (is_a($stmt, Node\Const_::class)) {
                        $class->consts[] = $stmt;
                    } else if (is_a($stmt, Node\Field::class)) {
                        $class->fields[] = $stmt;
                    }
                }

                return $class;
            })($this->yyastk[$yysp - (6 - 1)], $this->yyastk[$yysp - (6 - 4)]);
        
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)]; 
            },
            55 => function ($yysp) {
                
            $this->yyval = new Node\Class_([
                'name' => $this->yyastk[$yysp - (7 - 5)],

                'flags' => $this->yyastk[$yysp - (7 - 3)],

                'extends'    => $this->yyastk[$yysp - (7 - 6)],
                'implements' => $this->yyastk[$yysp - (7 - 7)],

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (7 - 1)],
                    'annotations' => $this->yyastk[$yysp - (7 - 2)]
                ]

            ]);
        
            },
            56 => function ($yysp) {
                 $this->yyval = 0; 
            },
            57 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            58 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            59 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            60 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL; 
            },
            61 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL_FINAL; 
            },
            62 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_DATA; 
            },
            63 => function ($yysp) {
                 $this->yyval = null; 
            },
            64 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            65 => function ($yysp) {
                 $this->yyval = []; 
            },
            66 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            67 => function ($yysp) {
                 $this->yyval = []; 
            },
            68 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            69 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            70 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            71 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            72 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            73 => function ($yysp) {
                
            $this->yyval = new Node\Const_([
                'name' => $this->yyastk[$yysp - (8 - 5)],

                'flags' => $this->yyastk[$yysp - (8 - 3)],

                'value' => is_null($this->yyastk[$yysp - (8 - 6)])?
                    null: static::parsePHP($this->yyastk[$yysp - (8 - 6)]),

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (8 - 1)],
                    'annotations' => $this->yyastk[$yysp - (8 - 2)]
                ]
            ]);

            $this->lexer->sendGaps = false;
        
            },
            74 => function ($yysp) {
                 $this->yyval = 0; 
            },
            75 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PUBLIC; 
            },
            76 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PROTECTED; 
            },
            77 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PRIVATE; 
            },
            78 => function ($yysp) {
                 $this->yyval = null; 
            },
            79 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 3)]; 
            },
            80 => function ($yysp) {
                 $this->lexer->sendGaps = true; 
            },
            81 => function ($yysp) {
                
            $this->yyval = new Node\Field([
                'name' => $this->yyastk[$yysp - (9 - 5)],

                'flags' => $this->yyastk[$yysp - (9 - 3)] | $this->yyastk[$yysp - (9 - 4)] | $this->yyastk[$yysp - (9 - 7)]['assign'],

                'type' => $this->yyastk[$yysp - (9 - 6)],

                'default' => is_null($this->yyastk[$yysp - (9 - 7)]['value'])?
                    null: static::parsePHP($this->yyastk[$yysp - (9 - 7)]['value']),

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (9 - 1)],
                    'annotations' => $this->yyastk[$yysp - (9 - 2)]
                ]
            ]);

            $this->lexer->sendGaps = false;
        
            },
            82 => function ($yysp) {
                 $this->yyval = 0; 
            },
            83 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_DIRECT; 
            },
            84 => function ($yysp) {
                 $this->yyval = 0; 
            },
            85 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_EDITABLE; 
            },
            86 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            87 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            88 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            89 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            90 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_FILTER_DEFAULT; 
            },
            91 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            92 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_DIRECT_DEFINING; 
            },
            93 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            94 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            95 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            96 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            97 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            98 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            99 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            100 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            101 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            102 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            103 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            104 => function ($yysp) {
                 $this->yyval = ''; 
            },
            105 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            106 => function ($yysp) {
                 $this->yyval = ''; 
            },
            107 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            108 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            109 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            110 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            111 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            112 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            113 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            114 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            115 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            116 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            117 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            118 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            119 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            120 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            121 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            122 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            123 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            124 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            125 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            126 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            127 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            128 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            129 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            130 => function ($yysp) {
                 $this->yyval = "**"; 
            },
            131 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            132 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            133 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            134 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            135 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            136 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            137 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            138 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            139 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            140 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            141 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            142 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            143 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            144 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            145 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            146 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            147 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            148 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            149 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            150 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            151 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            152 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            153 => function ($yysp) {
                 $this->yyval = "=>"; 
            },
            154 => function ($yysp) {
                 $this->yyval = "->"; 
            },
            155 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            156 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            157 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            158 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            159 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            160 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            161 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            162 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
        ];
    }

    protected function getComments(): array {
        $ret = [];

        $gaps = $this->lexer->getGaps();
        foreach ($gaps as $gap) {
            if ((int) preg_match_all('#//.*#', $gap->value, $matches) > 0) {
                foreach ($matches[0] as $comment) {
                    $ret[] = $comment;
                }
            }
        }

        return $ret;
    }

    public static function applyFlag(int $flags, int $flag): int {
        if ($flags & $flag) {
            $this->yyerror('Flag has already set');
        }

        return $flags | $flag;
    }

    public static function parsePHP(string $value): PHPNode\Expr {
        static $parser = null;

        if (is_null($parser)) {
            $parser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        }

        return $parser->parse("<?php $value;")[0]->expr;
    }
}
