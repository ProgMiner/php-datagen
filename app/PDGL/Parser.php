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

    const YYBADCH = 43;
    const YYMAXLEX = 272;
    const YYTERMS = 43;
    const YYNONTERMS = 48;

    const YYLAST = 121;

    const YY2TBLSTATE = 23;

    const YYGLAST = 53;

    const YYSTATES = 170;
    const YYNLSTATES = 76;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   25,   43,   43,   30,   34,   40,   43,
           21,   22,   32,   35,   17,   36,   37,   33,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   26,   19,
           39,   27,   38,   18,   20,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   28,   16,   29,   41,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   23,   42,   24,   31,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,    1,    2,    3,    4,
            5,    6,    7,    8,   43,    9,   10,   11,   12,   13,
           14,   15
    ];

    protected $yyaction = [
           83,   84,   85,   86,   78,   79,   80,  208,  -40,   77,
          153,  154,  218,  157,  170,  180,   24,   49,  172,    3,
           99,    1,  198,   57,   72,   25,    4,   16,  169,  171,
           26,   58,   59,   27,   20,   60,   28,   21,   29,   61,
           30,   78,   79,   80,   70,  207,   77,   83,   84,   85,
           86,  148,  149,  202,  193,  196,   71,   66,  197,  199,
          -39,  203,  189,  201,  211,   69,   68,  200,  210,  147,
            0,  188,  141,  142,   11,   13,  219,  113,  140,   97,
           14,   10,  160,   17,   15,   12,  159,  214,    0,    0,
           43,    0,   95,    0,   99,  168,    0,    0,   35,    0,
          158,  108,    0,    0,   74,  -57,  -58,    0,  128,    0,
            0,  216,  217,  215,  212,  213,  209,  205,  206,  204,
           65
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,   27,    0,   11,
           12,   13,   14,   15,   16,   17,   18,    2,   20,   21,
           19,   23,   42,   25,   23,   27,   28,    3,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
           42,    6,    7,    8,   27,   27,   11,    2,    3,    4,
            5,    9,   10,   27,   27,   38,   39,   27,   40,   18,
            0,   27,   36,   27,   38,   38,   32,   26,   38,   27,
            0,   35,    7,    8,    5,    4,   14,   11,    6,   15,
           17,   20,   24,   16,   16,   26,   29,   38,   -1,   -1,
           17,   -1,   18,   -1,   19,   19,   -1,   -1,   21,   -1,
           22,   22,   -1,   -1,   24,   24,   24,   -1,   25,   -1,
           -1,   27,   27,   27,   27,   27,   27,   27,   27,   27,
           27
    ];

    protected $yybase = [
           60,   76,   76,   -2,   -2,   -2,   -2,   -2,   -2,   45,
           68,   68,   68,   68,   68,   35,   35,   35,    1,   42,
           26,   17,   75,   65,   41,   30,   34,   36,   27,   18,
          -20,   81,    8,   61,   15,   66,   61,   82,   61,   77,
           15,   71,   72,   66,   69,   59,   64,   70,   67,   83,
           24,   67,   80,   79,   73,   63,   74,   93,   92,   91,
           90,   89,   62,   78,   58,   88,   87,   57,   86,   85,
           49,   84,    0,    0,    0,    0,    0,   -2,   -2,    0,
            0,    0,    0,    0,    0,   35,   35,   35,   35,   35,
           35,    0,    0,    0,   64,    0,    0,    0,   64
    ];

    protected $yydefault = [
           24,   87,   88,   85,   85,32767,   70,   86,   91,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   20,   69,
          102,  106,   20,32767,32767,  110,   98,  101,  105,  107,
          109,   24,   24,   25,   47,   33,   25,   24,   26,   31,
           48,   53,   63,32767,   55,   67,   20,32767,   14,   51,
        32767,   15,32767,32767,   34,   56,   18,   97,   99,  100,
          103,  108,   79,32767,32767,  119,  118,32767,  111,  115,
          116,  114,   24,   24,   24,   24
    ];

    protected $yygoto = [
           88,   88,   88,   88,   88,   88,   81,   89,   36,   92,
           56,  130,   93,  166,   36,    7,    7,    6,   67,  151,
          151,  151,   51,   75,   87,  118,  136,   42,  126,  112,
          104,    5,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,   31,
          121,  120,  138
    ];

    protected $yygcheck = [
            2,    2,    2,    2,    2,    2,    2,    2,   12,    7,
            7,    7,    7,   47,   12,   40,   40,   40,   44,   41,
           41,   41,    6,   11,    4,   23,   33,   13,   31,   20,
           15,   10,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   12,
           12,   12,   12
    ];

    protected $yygbase = [
            0,    0,  -10,    0,   15,    0,    7,   -2,    0,    0,
          -15,    1,  -23,   -9,    0,   -8,    0,    0,    0,    0,
          -14,    0,    0,   -7,    0,    0,    0,    0,    0,    0,
            0,  -12,    0,  -11,    0,    0,    0,    0,    0,    0,
           12,   13,    0,    0,   14,    0,    0,   11
    ];

    protected $yygdefault = [
        -32768,   47,   82,   41,  152,   45,   48,  106,   55,  144,
           98,   73,   33,   34,   38,  103,   39,  105,   53,   54,
          111,  114,   32,  117,  119,   18,   52,   50,   44,  122,
           40,  125,   37,  135,  137,   23,    9,   19,   22,   46,
            8,  150,   62,  156,   63,   64,    2,  165
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    8,    8,    9,    9,
           10,   10,   11,   11,   12,   13,   13,   14,   14,   15,
           16,   17,   17,   18,   18,   19,   19,   20,    1,   21,
           21,   22,   22,   23,   24,   24,   25,   27,   27,   30,
           30,   31,   31,   28,   28,   29,   29,   26,   26,   32,
           32,   33,   34,   35,   35,   36,   36,   37,   37,   38,
           38,   39,   39,   39,   40,   40,   41,   41,   41,   41,
           41,   41,   41,   41,   41,   44,   44,   45,   45,   46,
           46,   47,   47,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   42,   42
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    1,    3,    1,    2,
            0,    1,    1,    1,    0,    0,    1,    1,    2,    3,
            1,    0,    3,    0,    1,    1,    3,    1,    1,    0,
            1,    1,    2,    1,    6,    3,    7,    0,    1,    1,
            2,    1,    2,    0,    2,    0,    2,    0,    1,    1,
            2,    1,    9,    0,    1,    1,    1,    0,    2,    0,
            3,    1,    1,    1,    1,    2,    1,    1,    1,    1,
            1,    1,    3,    3,    3,    0,    1,    0,    1,    1,
            2,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    3,    3,    3,    3,
            3,    3,    1,    2
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
                
            $this->yyval = (function($class, $fields) {
                $class->fields = $fields;

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
            63 => function ($yysp) {
                 $this->yyval = 0; 
            },
            64 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_DIRECT; 
            },
            65 => function ($yysp) {
                 $this->yyval = 0; 
            },
            66 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_EDITABLE; 
            },
            67 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            68 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            69 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            70 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            71 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_FILTER_DEFAULT; 
            },
            72 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            73 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_DIRECT_DEFINING; 
            },
            74 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            75 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            83 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            84 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            85 => function ($yysp) {
                 $this->yyval = ''; 
            },
            86 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            87 => function ($yysp) {
                 $this->yyval = ''; 
            },
            88 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            89 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            90 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            91 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            92 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            93 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            94 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                 $this->yyval = "**"; 
            },
            112 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            113 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            114 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            115 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            116 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            117 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            118 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            119 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            120 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            121 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            122 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            123 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            124 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            125 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            126 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            127 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            128 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            129 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            130 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            131 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            132 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            133 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            134 => function ($yysp) {
                 $this->yyval = "=>"; 
            },
            135 => function ($yysp) {
                 $this->yyval = "->"; 
            },
            136 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            137 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            138 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            139 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            140 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            141 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            142 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            143 => function ($yysp) {
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
