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

    const YYBADCH = 48;
    const YYMAXLEX = 277;
    const YYTERMS = 48;
    const YYNONTERMS = 58;

    const YYLAST = 138;

    const YY2TBLSTATE = 31;

    const YYGLAST = 103;

    const YYSTATES = 209;
    const YYNLSTATES = 102;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   30,   48,   48,   35,   39,   45,   48,
           26,   27,   37,   40,   22,   41,   42,   38,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   32,   24,
           44,   31,   43,   23,   25,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   33,   21,   34,   46,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   28,   47,   29,   36,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,   48,   48,   48,   48,
           48,   48,   48,   48,   48,   48,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   48,
           14,   15,   16,   17,   18,   19,   20
    ];

    protected $yyaction = [
          109,  110,  111,  112,  104,  105,  106,  186,  194,  195,
          -75,  178,  179,  180,  103,  199,  200,  264,  203,  216,
          226,   33,   19,  218,    3,  193,    1,   65,   77,   34,
           21,    4,   20,  215,  217,   35,   78,   79,   36,   26,
           80,   37,   27,   38,   81,   39,  104,  105,  106,  109,
          110,  111,  112,   90,  254,  245,  103,  248,  253,   86,
          -40,  239,  187,  188,  246,  242,   91,  235,  247,  257,
          244,  256,  243,   89,  249,  125,  -48,  234,  -39,   94,
           88,  -48,    0,   15,  139,   13,  156,  123,   16,  265,
           12,  134,   23,   18,   85,   56,   93,  260,  121,    0,
           41,  125,    0,    0,    0,  214,    0,    0,    0,   46,
            0,  204,    0,   97,    0,  -69,  -68,   96,   99,  206,
            0,  165,    0,  183,  250,  252,  251,  255,  259,  258,
          261,  263,  262,    0,   14,    0,    0,  205
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    6,   14,   15,
            9,   10,   11,   12,   16,   17,   18,   19,   20,   21,
           22,   23,    3,   25,   26,   31,   28,    2,   30,   31,
            9,   33,   13,   35,   36,   37,   38,   39,   40,   41,
           42,   43,   44,   45,   46,   47,    6,    7,    8,    2,
            3,    4,    5,   31,   31,   23,   16,   31,   31,   31,
            0,   31,    7,    8,   32,   43,   44,   41,   31,   43,
           47,   43,   45,   43,   31,   24,   24,   40,    0,   28,
           37,   29,    0,    4,   16,    5,   17,   20,   22,   19,
           25,   27,   21,   21,   31,   22,   22,   43,   23,   -1,
           24,   24,   -1,   -1,   -1,   24,   -1,   -1,   -1,   26,
           -1,   27,   -1,   28,   -1,   29,   29,   29,   29,   29,
           -1,   30,   -1,   31,   31,   31,   31,   31,   31,   31,
           31,   31,   31,   -1,   32,   -1,   -1,   34
    ];

    protected $yybase = [
           78,   81,   81,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   47,   72,   72,   72,   72,   72,    1,   40,   40,
           40,   40,   40,   40,   51,   -6,   26,   22,   52,   77,
           77,   55,   19,   32,   28,   43,   37,   30,   27,   23,
           87,   87,   60,   86,   65,   25,   68,   65,   65,   92,
           92,   65,   83,   25,   79,   79,   68,   80,   80,  102,
           67,   67,   67,   82,   71,   91,   71,   88,   64,   73,
           21,   85,   66,   89,   76,   74,   75,   63,   93,   94,
           95,   96,   70,   84,   90,   97,   98,  103,   99,  100,
           54,  101,   69,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,   -2,   -2,    0,    0,    0,    0,    0,
            0,    0,    0,   40,   40,   40,   40,   40,   40,    0,
            0,    0,    0,    0,    0,    0,   67,    0,    0,    0,
            0,   67,   67
    ];

    protected $yydefault = [
           24,  107,  108,  105,  105,32767,32767,   80,  106,  111,
           90,32767,32767,32767,32767,32767,32767,   83,32767,32767,
        32767,32767,32767,32767,   20,   89,  122,  126,   24,   20,
           20,32767,32767,32767,  130,  118,  121,  125,  127,  129,
           24,   24,   24,   24,   25,   58,   33,   25,   25,   79,
           53,   26,   31,   59,   64,   64,32767,   66,   66,   87,
           20,   20,   20,32767,   14,   62,   15,32767,32767,   34,
        32767,32767,   67,32767,   46,   49,   18,  117,  119,  120,
          123,  128,   99,32767,32767,  139,  138,32767,  131,  135,
          136,  134,32767,   24,   24,   24,   24,   24,   24,   24,
           24,   24
    ];

    protected $yygoto = [
           87,   44,  114,  114,  114,  114,  114,  212,  114,  107,
          107,  107,  107,  115,    8,    8,    7,   10,  113,  197,
          197,  197,  197,  118,   76,  167,  119,   98,  100,   48,
            5,    6,   92,   55,   49,   50,   17,   22,   66,  144,
          149,   62,   58,   44,  130,  173,   71,  163,  138,  153,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,   48,   40,  158,  157,   28,  176,
          147,  184,  154
    ];

    protected $yygcheck = [
           54,   12,    2,    2,    2,    2,    2,   57,    2,    2,
            2,    2,    2,    2,   45,   45,   45,   45,    4,   51,
           51,   51,   51,    7,    7,    7,    7,   11,   11,   12,
           10,   10,   10,    3,    3,    3,   13,   13,    6,   23,
           31,   35,   27,   12,   15,   40,   28,   38,   20,   33,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   12,   12,   12,   12,   12,   12,
           12,   12,   12
    ];

    protected $yygbase = [
            0,    0,  -10,   13,    7,    0,   20,   10,    0,    0,
          -30,   -2,    1,  -11,    0,   -7,    0,    0,    0,    0,
           -8,    0,    0,   -3,    0,    0,    0,  -13,  -12,    0,
            0,   -1,    0,  -44,    0,   -9,    0,    0,   -6,    0,
            2,    0,    0,    0,    0,   11,    0,    0,    0,    0,
            0,   12,    0,    0,   -4,    0,    0,    5
    ];

    protected $yygdefault = [
        -32768,   63,  108,   54,  198,   59,   64,  132,   72,  190,
          124,   95,   47,   45,   51,  129,   52,  131,   68,   69,
          137,  140,   42,  143,  145,  146,   32,   57,  159,   73,
           74,   67,   75,  152,  101,   60,   24,   53,  162,   43,
          172,  174,  175,   70,   29,    9,   31,   11,   25,   30,
           61,  196,   82,  202,   83,   84,    2,  211
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    8,    8,    9,    9,
           10,   10,   11,   11,   12,   13,   13,   14,   14,   15,
           16,   17,   17,   18,   18,   19,   19,   20,    1,   21,
           21,   22,   22,   23,   23,   25,   29,   29,   30,   30,
           32,   32,   33,   34,   34,   24,   24,   36,   26,   26,
           37,   37,   38,   38,   27,   27,   28,   28,   31,   31,
           39,   39,   40,   40,   42,   43,   43,   43,   43,   44,
           44,   35,   41,   46,   46,   47,   47,   48,   48,   49,
           49,   50,   50,   50,   45,   45,   51,   51,   51,   51,
           51,   51,   51,   51,   51,   54,   54,   55,   55,   56,
           56,   57,   57,   53,   53,   53,   53,   53,   53,   53,
           53,   53,   53,   53,   53,   53,   53,   53,   53,   53,
           53,   53,   53,   53,   53,   53,   53,   53,   53,   53,
           53,   53,   53,   53,   53,   53,   53,   53,   53,   53,
           53,   53,   53,   53,   53,   53,   53,   53,   53,   53,
           53,   53,   52,   52
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    1,    3,    1,    2,
            0,    1,    1,    1,    0,    0,    1,    1,    2,    3,
            1,    0,    3,    0,    1,    1,    3,    1,    1,    0,
            1,    1,    2,    1,    1,   12,    1,    3,    0,    1,
            1,    3,    5,    0,    3,    6,    3,    7,    0,    1,
            1,    2,    1,    2,    0,    2,    0,    2,    0,    1,
            1,    2,    1,    1,    8,    0,    1,    1,    1,    0,
            3,    1,    9,    0,    1,    1,    1,    0,    2,    0,
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
                
            $this->yyval = (function($class, $stmts) {
                foreach ($stmts as $stmt) {
                    if (is_a($stmt, Node\Const_::class)) {
                        $class->consts[] = $stmt;
                    } else if (is_a($stmt, Node\Field::class)) {
                        $class->fields[] = $stmt;
                    }
                }

                return $class;
            })(new Node\Class_([
                'name' => $this->yyastk[$yysp - (12 - 5)],

                'flags' => $this->yyastk[$yysp - (12 - 3)],

                'extends'    => $this->yyastk[$yysp - (12 - 6)],
                'implements' => $this->yyastk[$yysp - (12 - 7)],

                'attributes' => [
                    'comments'    => $this->yyastk[$yysp - (12 - 1)],
                    'annotations' => $this->yyastk[$yysp - (12 - 2)]
                ]

            ]), $this->yyastk[$yysp - (12 - 10)]);
        
            },
            46 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (1 - 1)]; 
            },
            47 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], $this->yyastk[$yysp - (3 - 3)]); 
            },
            48 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            49 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (1 - 1)]; 
            },
            50 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            51 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            52 => function ($yysp) {
                
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
            53 => function ($yysp) {
                 $this->yyval = null; 
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 3)]; 
            },
            55 => function ($yysp) {
                
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
            56 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)]; 
            },
            57 => function ($yysp) {
                
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
            58 => function ($yysp) {
                 $this->yyval = 0; 
            },
            59 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            60 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            61 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            62 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL; 
            },
            63 => function ($yysp) {
                 $this->yyval = Node\Class_::FLAG_FINAL_FINAL; 
            },
            64 => function ($yysp) {
                 $this->yyval = null; 
            },
            65 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            66 => function ($yysp) {
                 $this->yyval = []; 
            },
            67 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            68 => function ($yysp) {
                 $this->yyval = []; 
            },
            69 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            70 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            71 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            72 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            73 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            74 => function ($yysp) {
                
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
            75 => function ($yysp) {
                 $this->yyval = 0; 
            },
            76 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PUBLIC; 
            },
            77 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PROTECTED; 
            },
            78 => function ($yysp) {
                 $this->yyval = Node\Const_::FLAG_PRIVATE; 
            },
            79 => function ($yysp) {
                 $this->yyval = null; 
            },
            80 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 3)]; 
            },
            81 => function ($yysp) {
                 $this->lexer->sendGaps = true; 
            },
            82 => function ($yysp) {
                
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
            83 => function ($yysp) {
                 $this->yyval = 0; 
            },
            84 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_DIRECT; 
            },
            85 => function ($yysp) {
                 $this->yyval = 0; 
            },
            86 => function ($yysp) {
                 $this->yyval = Node\Field::FLAG_EDITABLE; 
            },
            87 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            88 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            89 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            90 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            91 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_FILTER_DEFAULT; 
            },
            92 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            93 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Node\Field::FLAG_DIRECT_DEFINING; 
            },
            94 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            95 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            103 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            104 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            105 => function ($yysp) {
                 $this->yyval = ''; 
            },
            106 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            107 => function ($yysp) {
                 $this->yyval = ''; 
            },
            108 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            109 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            110 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            131 => function ($yysp) {
                 $this->yyval = "**"; 
            },
            132 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            133 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            134 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            135 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            136 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            137 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            138 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            139 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            140 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            141 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            142 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            143 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            144 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            145 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            146 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            147 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            148 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            149 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            150 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            151 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            152 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            153 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            154 => function ($yysp) {
                 $this->yyval = "=>"; 
            },
            155 => function ($yysp) {
                 $this->yyval = "->"; 
            },
            156 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            157 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            158 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            159 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            160 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            161 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            162 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            163 => function ($yysp) {
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
