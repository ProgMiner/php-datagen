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

    const YYBADCH = 47;
    const YYMAXLEX = 276;
    const YYTERMS = 47;
    const YYNONTERMS = 52;

    const YYLAST = 125;

    const YY2TBLSTATE = 28;

    const YYGLAST = 58;

    const YYSTATES = 184;
    const YYNLSTATES = 84;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   29,   47,   47,   34,   38,   44,   47,
           25,   26,   36,   39,   21,   40,   41,   37,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   31,   23,
           43,   30,   42,   22,   24,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   32,   20,   33,   45,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   27,   46,   28,   35,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   47,   13,
           14,   15,   16,   17,   18,   19
    ];

    protected $yyaction = [
           91,   92,   93,   94,   86,   87,   88,   91,   92,   93,
           94,  -40,  224,   85,  170,  171,  235,  174,  187,  197,
           29,  -39,  189,    3,    0,    1,  214,   64,   30,   55,
            4,   20,  186,  188,   31,   65,   66,   32,   24,   67,
           33,   25,   34,   68,   35,  157,  165,  166,  -64,  149,
          150,  151,   86,   87,   88,   77,  225,  216,   73,  219,
           19,   85,  210,  164,  218,   15,  217,  213,   78,  206,
          227,  228,  215,  205,   76,  220,  107,  158,  159,   13,
           79,   75,  121,  236,   21,  105,  107,   41,   18,  136,
           16,  176,   48,  231,  103,    0,  185,    0,    0,   12,
            0,    0,  116,  175,    0,    0,  -58,  -57,   81,  177,
            0,    0,   72,  154,  221,  223,  222,  226,  230,  229,
          232,  234,  233,    0,   14
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    2,    3,    4,
            5,    0,   30,   15,   16,   17,   18,   19,   20,   21,
           22,    0,   24,   25,    0,   27,   44,   29,   30,    2,
           32,    9,   34,   35,   36,   37,   38,   39,   40,   41,
           42,   43,   44,   45,   46,    6,   13,   14,    9,   10,
           11,   12,    6,    7,    8,   30,   30,   22,   30,   30,
            3,   15,   30,   30,   30,    4,   31,   42,   43,   40,
           42,   42,   46,   39,   42,   30,   23,    7,    8,    5,
           27,   36,   15,   18,   20,   19,   23,   25,   20,   29,
           21,   33,   21,   42,   22,   -1,   23,   -1,   -1,   24,
           -1,   -1,   26,   26,   -1,   -1,   28,   28,   28,   28,
           -1,   -1,   30,   30,   30,   30,   30,   30,   30,   30,
           30,   30,   30,   -1,   31
    ];

    protected $yybase = [
           21,   73,   73,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,    5,   68,   68,   68,   68,   68,   39,   46,   46,
           46,   46,   53,   33,   29,   25,   63,   63,   70,   35,
           28,   45,   34,   32,  -18,   26,   79,   11,   78,   75,
           27,   67,   75,   83,   75,   62,   27,   61,   67,   74,
           93,   66,   66,   24,   64,   60,   57,   64,   80,   76,
           71,   22,   69,   72,   82,   84,   85,   86,   87,   65,
           77,   81,   88,   89,   58,   90,   91,   51,   92,    0,
            0,    0,    0,    0,    0,   -2,   -2,    0,    0,    0,
            0,    0,    0,    0,    0,   46,   46,   46,   46,   46,
           46,    0,    0,    0,    0,    0,   66,    0,    0,    0,
           66,   66
    ];

    protected $yydefault = [
           24,   96,   97,   94,   94,32767,32767,   69,   95,  100,
           79,32767,32767,32767,32767,32767,32767,   72,32767,32767,
        32767,32767,   20,   78,  111,  115,   20,   20,32767,32767,
          119,  107,  110,  114,  116,  118,   24,   24,   24,   25,
           47,   33,   25,   68,   26,   31,   48,   53,32767,   55,
           76,   20,   20,32767,   14,   51,32767,   15,32767,32767,
           34,32767,   56,   18,  106,  108,  109,  112,  117,   88,
        32767,32767,  128,  127,32767,  120,  124,  125,  123,   24,
           24,   24,   24,   24
    ];

    protected $yygoto = [
           96,   96,   96,   96,   96,  183,   96,   89,   89,   97,
           42,   74,   42,    8,    8,    7,   10,   95,  168,  168,
          168,  168,  100,   63,  138,  101,   57,   82,   83,    5,
            6,  126,   43,  144,   17,  112,  134,  120,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,   36,  129,  128,  147,  155
    ];

    protected $yygcheck = [
            2,    2,    2,    2,    2,   51,    2,    2,    2,    2,
           12,   48,   12,   39,   39,   39,   39,    4,   45,   45,
           45,   45,    7,    7,    7,    7,    6,   11,   11,   10,
           10,   23,    3,   33,   13,   15,   31,   20,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   12,   12,   12,   12,   12
    ];

    protected $yygbase = [
            0,    0,  -12,   12,    6,    0,    8,    9,    0,    0,
          -22,    1,  -26,   -8,    0,   -9,    0,    0,    0,    0,
          -11,    0,    0,   -6,    0,    0,    0,    0,    0,    0,
            0,  -10,    0,   -5,    0,    0,    0,    0,    0,   10,
            0,    0,    0,    0,    0,   11,    0,    0,    7,    0,
            0,    3
    ];

    protected $yygdefault = [
        -32768,   53,   90,   47,  169,   50,   54,  114,   62,  161,
          106,   80,   39,   40,   44,  111,   45,  113,   59,   60,
          119,  122,   37,  125,  127,   22,   58,   56,   49,  130,
           46,  133,   38,  143,  145,  146,   61,   26,   51,    9,
           28,   11,   23,   27,   52,  167,   69,  173,   70,   71,
            2,  182
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    8,    8,    9,    9,
           10,   10,   11,   11,   12,   13,   13,   14,   14,   15,
           16,   17,   17,   18,   18,   19,   19,   20,    1,   21,
           21,   22,   22,   23,   24,   24,   25,   27,   27,   30,
           30,   31,   31,   28,   28,   29,   29,   26,   26,   32,
           32,   33,   33,   35,   36,   36,   36,   36,   37,   37,
           38,   34,   40,   40,   41,   41,   42,   42,   43,   43,
           44,   44,   44,   39,   39,   45,   45,   45,   45,   45,
           45,   45,   45,   45,   48,   48,   49,   49,   50,   50,
           51,   51,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   47,   47,   47,   47,   47,   47,   47,   47,   47,
           47,   46,   46
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    1,    3,    1,    2,
            0,    1,    1,    1,    0,    0,    1,    1,    2,    3,
            1,    0,    3,    0,    1,    1,    3,    1,    1,    0,
            1,    1,    2,    1,    6,    3,    7,    0,    1,    1,
            2,    1,    2,    0,    2,    0,    2,    0,    1,    1,
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
                 $this->yyval = ''; 
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
            45 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)]; 
            },
            46 => function ($yysp) {
                
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
            47 => function ($yysp) {
                 $this->yyval = 0; 
            },
            48 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            49 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            50 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            51 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL; 
            },
            52 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL_FINAL; 
            },
            53 => function ($yysp) {
                 $this->yyval = null; 
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            55 => function ($yysp) {
                 $this->yyval = []; 
            },
            56 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            57 => function ($yysp) {
                 $this->yyval = []; 
            },
            58 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            59 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            60 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            61 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            62 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            63 => function ($yysp) {
                
            $this->yyval = new Node\Const_([
                'name' => $this->yyastk[$yysp - (8 - 5)],

                'flags' => $this->yyastk[$yysp - (8 - 3)],

                'value' => is_null($this->yyastk[$yysp - (8 - 6)])?
                    new PHPNode\Scalar\LNumber($this->constCounter++):
                    static::parsePHP($this->yyastk[$yysp - (8 - 6)]),

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (8 - 1)],
                    'annotations' => $this->yyastk[$yysp - (8 - 2)]
                ]
            ]);

            $this->lexer->sendGaps = false;
        
            },
            64 => function ($yysp) {
                 $this->yyval = 0; 
            },
            65 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PUBLIC; 
            },
            66 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PROTECTED; 
            },
            67 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PRIVATE; 
            },
            68 => function ($yysp) {
                 $this->yyval = null; 
            },
            69 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 3)]; 
            },
            70 => function ($yysp) {
                 $this->lexer->sendGaps = true; 
            },
            71 => function ($yysp) {
                
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
            72 => function ($yysp) {
                 $this->yyval = 0; 
            },
            73 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_DIRECT; 
            },
            74 => function ($yysp) {
                 $this->yyval = 0; 
            },
            75 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_EDITABLE; 
            },
            76 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            77 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            78 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            79 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            80 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_FILTER_DEFAULT; 
            },
            81 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            82 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_DIRECT_DEFINING; 
            },
            83 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            84 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            85 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            86 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            87 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            88 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            89 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            90 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            91 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            92 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            93 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            94 => function ($yysp) {
                 $this->yyval = ''; 
            },
            95 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            96 => function ($yysp) {
                 $this->yyval = ''; 
            },
            97 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            98 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            99 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            100 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            101 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            102 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            103 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            104 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            105 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            106 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            107 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            108 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            109 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                 $this->yyval = "**"; 
            },
            121 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            122 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            123 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            124 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            125 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            126 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            127 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            128 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            129 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            130 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            131 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            132 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            133 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            134 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            135 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            136 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            137 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            138 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            139 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            140 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            141 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            142 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            143 => function ($yysp) {
                 $this->yyval = "=>"; 
            },
            144 => function ($yysp) {
                 $this->yyval = "->"; 
            },
            145 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            146 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            147 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            148 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            149 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            150 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            151 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            152 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
        ];
    }

    protected $constCounter = 0;

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
