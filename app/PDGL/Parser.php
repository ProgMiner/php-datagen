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
    const YYNONTERMS = 47;

    const YYLAST = 118;

    const YY2TBLSTATE = 22;

    const YYGLAST = 53;

    const YYSTATES = 167;
    const YYNLSTATES = 75;
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
           82,   83,   84,   85,   77,   78,   79,  205,  -40,   76,
          150,  151,  215,  154,  167,  177,   23,   48,  169,    3,
            0,    1,  195,   57,  -39,   24,    4,   13,  166,  168,
           25,   58,   59,   26,   19,   60,   27,   20,   28,   61,
           29,   77,   78,   79,   70,  204,   76,   82,   83,   84,
           85,  145,  146,  199,   66,  193,   71,  190,  194,  196,
           16,  200,  186,  198,  208,  207,   68,  197,   69,  144,
          137,  185,  138,  139,   11,  216,   15,  112,   96,   41,
           34,   72,   12,   17,  156,   14,  211,    0,   94,    0,
          165,   98,    0,   10,    0,    0,  107,  155,    0,    0,
          157,   73,  -55,  -56,    0,  125,    0,    0,  213,  214,
          212,  209,  210,  206,  202,  203,  201,   65
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,   27,    0,   11,
           12,   13,   14,   15,   16,   17,   18,    2,   20,   21,
            0,   23,   42,   25,    0,   27,   28,    4,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
           42,    6,    7,    8,   27,   27,   11,    2,    3,    4,
            5,    9,   10,   27,   27,   38,   39,   27,   40,   18,
            3,   27,   36,   27,   38,   38,   32,   26,   38,   27,
            6,   35,    7,    8,    5,   14,   16,   11,   15,   17,
           21,   23,   26,   16,   29,   17,   38,   -1,   18,   -1,
           19,   19,   -1,   20,   -1,   -1,   22,   22,   -1,   -1,
           24,   24,   24,   24,   -1,   25,   -1,   -1,   27,   27,
           27,   27,   27,   27,   27,   27,   27,   27
    ];

    protected $yybase = [
           24,   71,   71,   -2,   -2,   -2,   -2,   -2,   -2,   45,
           60,   60,   60,   60,   60,   35,   35,   35,   42,   26,
           17,   72,   65,   41,   27,   34,   36,   30,   18,  -20,
           78,   73,    8,   15,   66,   73,   79,   73,   59,   15,
           23,   66,   69,   64,   56,   63,   20,   67,   80,   57,
           67,   74,   62,   58,   68,   77,   70,   90,   89,   88,
           87,   86,   61,   75,   76,   85,   84,   55,   83,   82,
           48,   81,    0,    0,    0,    0,   -2,   -2,    0,    0,
            0,    0,    0,    0,   35,   35,   35,   35,   35,   35,
            0,    0,    0,    0,    0,    0,   63
    ];

    protected $yydefault = [
           24,   85,   86,   83,   83,32767,   68,   84,   89,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   67,  100,
          104,   20,32767,32767,  108,   96,   99,  103,  105,  107,
           24,   25,   24,   45,   33,   25,   24,   26,   31,   46,
           51,32767,   53,   61,   65,   20,32767,   14,   49,32767,
           15,32767,   34,32767,   54,32767,   18,   95,   97,   98,
          101,  106,   77,32767,32767,  117,  116,32767,  109,  113,
          114,  112,   24,   24,   24
    ];

    protected $yygoto = [
           87,   87,   87,   87,   87,   87,   80,   88,   35,   91,
           56,  127,   92,  163,   35,    7,    7,    6,   67,  148,
          148,  148,   50,  117,   86,  133,  123,   43,    5,  111,
          103,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
           30,  119,  135
    ];

    protected $yygcheck = [
            2,    2,    2,    2,    2,    2,    2,    2,   12,    7,
            7,    7,    7,   46,   12,   39,   39,   39,   43,   40,
           40,   40,    6,   23,    4,   32,   30,   13,   10,   20,
           15,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           12,   12,   12
    ];

    protected $yygbase = [
            0,    0,  -10,    0,   15,    0,    7,   -2,    0,    0,
          -17,    0,  -22,   -8,    0,   -7,    0,    0,    0,    0,
          -12,    0,    0,   -9,    0,    0,    0,    0,    0,    0,
          -13,    0,  -11,    0,    0,    0,    0,    0,    0,   12,
           13,    0,    0,   14,    0,    0,   11
    ];

    protected $yygdefault = [
        -32768,   46,   81,   40,  149,   44,   47,  105,   54,  141,
           97,   74,   31,   33,   37,  102,   38,  104,   51,   52,
          110,  113,   32,  116,  118,   49,   42,   53,   55,   39,
          122,   36,  132,  134,   22,    9,   18,   21,   45,    8,
          147,   62,  153,   63,   64,    2,  162
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    8,    8,    9,    9,
           10,   10,   11,   11,   12,   13,   13,   14,   14,   15,
           16,   17,   17,   18,   18,   19,   19,   20,    1,   21,
           21,   22,   22,   23,   24,   25,   25,   29,   29,   30,
           30,   26,   26,   27,   27,   28,   28,   31,   31,   32,
           33,   34,   34,   35,   35,   36,   36,   37,   37,   38,
           38,   38,   39,   39,   40,   40,   40,   40,   40,   40,
           40,   40,   40,   43,   43,   44,   44,   45,   45,   46,
           46,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           41,   41
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    1,    3,    1,    2,
            0,    1,    1,    1,    0,    0,    1,    1,    2,    3,
            1,    0,    3,    0,    1,    1,    3,    1,    1,    0,
            1,    1,    2,    1,   12,    0,    1,    1,    2,    1,
            2,    0,    2,    0,    2,    0,    1,    1,    2,    1,
            9,    0,    1,    1,    1,    0,    2,    0,    3,    1,
            1,    1,    1,    2,    1,    1,    1,    1,    1,    1,
            3,    3,    3,    0,    1,    0,    1,    1,    2,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    3,    3,    3,    3,    3,    3,
            1,    2
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
                
            $this->yyval = new Node\Class_([
                'name' => $this->yyastk[$yysp - (12 - 5)],

                'flags' => $this->yyastk[$yysp - (12 - 3)],

                'extends'    => $this->yyastk[$yysp - (12 - 6)],
                'implements' => $this->yyastk[$yysp - (12 - 7)],

                'fields' => $this->yyastk[$yysp - (12 - 10)],

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (12 - 1)],
                    'annotations' => $this->yyastk[$yysp - (12 - 2)]
                ]

            ]);
        
            },
            45 => function ($yysp) {
                 $this->yyval = 0; 
            },
            46 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            47 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            48 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            49 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL; 
            },
            50 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL_FINAL; 
            },
            51 => function ($yysp) {
                 $this->yyval = null; 
            },
            52 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            53 => function ($yysp) {
                 $this->yyval = []; 
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            55 => function ($yysp) {
                 $this->yyval = []; 
            },
            56 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            57 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            58 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            59 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            60 => function ($yysp) {
                
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
            61 => function ($yysp) {
                 $this->yyval = 0; 
            },
            62 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_DIRECT; 
            },
            63 => function ($yysp) {
                 $this->yyval = 0; 
            },
            64 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_EDITABLE; 
            },
            65 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            66 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            67 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            68 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            69 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_FILTER_DEFAULT; 
            },
            70 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            71 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_DIRECT_DEFINING; 
            },
            72 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            73 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            81 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            82 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            83 => function ($yysp) {
                 $this->yyval = ''; 
            },
            84 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            85 => function ($yysp) {
                 $this->yyval = ''; 
            },
            86 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            87 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            88 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            89 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            90 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                 $this->yyval = "**"; 
            },
            110 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            111 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            112 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            113 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            114 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            115 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            116 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            117 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            118 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            119 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            120 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            121 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            122 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            123 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            124 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            125 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            126 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            127 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            128 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            129 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            130 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            131 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            132 => function ($yysp) {
                 $this->yyval = "=>"; 
            },
            133 => function ($yysp) {
                 $this->yyval = "->"; 
            },
            134 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            135 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            136 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            137 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            138 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            139 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            140 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            141 => function ($yysp) {
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
