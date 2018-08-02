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

    const YYBADCH = 43;
    const YYMAXLEX = 271;
    const YYTERMS = 43;
    const YYNONTERMS = 26;

    const YYLAST = 133;

    const YY2TBLSTATE = 61;

    const YYGLAST = 50;

    const YYSTATES = 136;
    const YYNLSTATES = 85;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   17,   43,   43,   24,   33,   27,   43,
           25,   26,   30,   28,   19,   29,   32,   31,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   21,   20,
           36,   23,   37,   22,   39,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   40,   18,   41,   35,   43,   42,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   15,   34,   16,   38,   43,   43,   43,
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
           14
    ];

    protected $yyaction = [
           93,   94,   95,   96,   97,   98,   99,   84,   67,   92,
          132,  135,  186,   17,  173,   22,   52,  130,  131,   -1,
          152,   23,   24,   18,    0,   25,   26,   27,  153,  121,
          122,  129,   51,   47,   49,   33,   28,   29,   19,   81,
           30,   34,  120,  178,   53,   35,   36,   37,   82,  146,
          147,  148,   83,  151,   61,   62,  187,  102,   33,   63,
           39,  182,   81,   91,   34,   50,   52,  126,   35,   36,
           37,   82,  146,  147,  148,   83,  151,   61,   62,   33,
          118,   38,   48,   81,  175,   34,   42,   40,   41,   35,
           36,   37,   82,  146,  147,  148,   83,  151,   61,   62,
           33,   45,   46,  139,   81,   32,   34,  159,   31,   43,
           35,   36,   37,   82,  146,  147,  148,   83,  151,   61,
           62,   93,   94,   95,   96,   97,   98,   99,   44,  169,
           92,  154,  176
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,   23,    2,   11,
           12,   13,   14,   15,   23,   17,   18,    9,   10,    0,
           36,   23,   24,   25,    0,   27,   28,   29,   37,    7,
            8,   23,    3,    5,    4,   17,   38,   39,   40,   21,
           42,   23,    6,   16,   18,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   14,   17,   17,   15,
           42,   20,   21,   16,   23,   19,   18,   22,   27,   28,
           29,   30,   31,   32,   33,   34,   35,   36,   37,   17,
           20,   19,   21,   21,   21,   23,   27,   23,   23,   27,
           28,   29,   30,   31,   32,   33,   34,   35,   36,   37,
           17,   23,   23,   26,   21,   29,   23,   34,   28,   28,
           27,   28,   29,   30,   31,   32,   33,   34,   35,   36,
           37,    2,    3,    4,    5,    6,    7,    8,   29,   37,
           11,   30,   41
    ];

    protected $yybase = [
            6,   41,   62,   83,   83,   83,   83,   83,   83,   83,
           83,   83,   18,   83,   83,   83,   83,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,   80,   76,   -2,   -2,
           -2,   80,   76,   64,   65,   59,   81,   99,   -2,   -2,
           78,   79,   -2,   80,   76,   -2,   -2,   48,   48,   48,
           48,  119,  119,  119,  119,    8,   19,   28,   47,   22,
           45,  -16,   -9,   36,   28,   30,   61,   40,   24,   29,
           44,   26,   26,   46,   26,   60,   26,   42,   27,   77,
           91,   63,  101,   73,   92,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   -2,    0,    0,    0,    0,    0,    0,    0,    0,
            0,   -2,   -2,    0,    0,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,    0,    0,   -2,   -2,    0,   -2,   -2,
            0,    0,  119,  119,  119,  119,    0,    0,    0,    0,
            0,    6,   30,   36,    0,   26
    ];

    protected $yydefault = [
            4,32767,   95,   43,   78,   56,   52,   57,   76,   77,
           79,   89,32767,   53,   72,   73,   96,   98,   94,   94,
           99,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,   55,   64,   58,   59,32767,   92,
           83,   82,   75,   70,   71,   81,   80,32767,32767,32767,
        32767,32767,32767,32767,32767,   42,   15,   20,   34,32767,
           40,   85,   87,   29,   22,   20,   38,   16,32767,32767,
        32767,   21,   27,   23,   28,32767,   49,   51,32767,32767,
        32767,32767,   60,   65,   86
    ];

    protected $yygoto = [
            1,    2,    2,    1,    3,    4,    5,    6,    7,    8,
            9,   10,   11,   12,   14,   15,    4,    5,    7,    8,
            9,   16,   12,    5,    5,    7,   14,   15,    5,    5,
           80,  109,  109,  109,  109,   57,  110,  111,   66,   72,
           60,   71,   74,  185,   88,  115,  104,    0,    0,  103
    ];

    protected $yygcheck = [
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           23,    6,    6,    6,    6,    6,    6,    6,    6,   11,
           11,   11,   11,   25,    3,   13,    9,   -1,   -1,   10
    ];

    protected $yygbase = [
            0,    0,    0,  -12,    0,    0,  -16,    0,    0,  -19,
          -15,   -8,    0,  -18,    0,    0,    0,    0,    0,    0,
            0,  -17,    0,   11,    0,   23
    ];

    protected $yygdefault = [
        -32768,   68,   56,   87,   90,   69,  109,   70,   58,   64,
           65,   76,   73,  116,  117,   59,   54,   55,   75,  124,
           21,   13,   77,   79,   78,   20
    ];

    protected $yylhs = [
            0,    1,    2,    2,    2,    3,    4,    6,    6,    6,
            6,    6,    6,    6,    6,    5,    5,    5,    7,    7,
            9,    9,   10,   10,   11,   11,   11,   12,   12,    8,
            8,    8,   13,   14,   15,   15,   16,   16,   17,   17,
           19,   19,   18,   18,   20,   20,   20,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   23,   23,   23,   25,   24,   24,
           24,   22,   22
    ];

    protected $yylen = [
            1,    1,    1,    2,    0,    1,    7,    1,    1,    1,
            1,    1,    1,    1,    1,    0,    1,    2,    2,    2,
            0,    2,    0,    2,    1,    2,    3,    1,    3,    0,
            1,    2,    1,    6,    0,    1,    1,    1,    0,    2,
            1,    2,    0,    2,    1,    1,    1,    1,    1,    1,
            1,    1,    2,    2,    3,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    3,    3,    3,
            3,    3,    3,    3,    3,    3,    2,    2,    2,    2,
            4,    4,    3,    3,    4,    2,    3,    2,    3,    2,
            3,    3,    3,    3,    0,    1,    3,    2,    0,    1,
            2,    1,    2
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
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            3 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            4 => function ($yysp) {
                 $this->yyval = []; 
            },
            5 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            6 => function ($yysp) {
                
            $this->yyval = new Model\Class_([
                'name' => $this->yyastk[$yysp - (7 - 3)],

                'data'       => ($this->yyastk[$yysp - (7 - 1)] & 4) !== 0,
                'final'      => ($this->yyastk[$yysp - (7 - 1)] & 1) !== 0,
                'finalFinal' => ($this->yyastk[$yysp - (7 - 1)] & 2) !== 0,

                'extends'    => $this->yyastk[$yysp - (7 - 4)]['extends'],
                'implements' => $this->yyastk[$yysp - (7 - 4)]['implements'],

                'fields' => $this->yyastk[$yysp - (7 - 6)]
            ]);
		
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            12 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            13 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            14 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            15 => function ($yysp) {
                 $this->yyval = 0; 
            },
            16 => function ($yysp) {
                 $this->yyval = 1; 
            },
            17 => function ($yysp) {
                 $this->yyval = 3; 
            },
            18 => function ($yysp) {
                 $this->yyval = ['extends' => $this->yyastk[$yysp - (2 - 1)], 'implements' => $this->yyastk[$yysp - (2 - 2)]]; 
            },
            19 => function ($yysp) {
                 $this->yyval = ['extends' => $this->yyastk[$yysp - (2 - 2)], 'implements' => $this->yyastk[$yysp - (2 - 1)]]; 
            },
            20 => function ($yysp) {
                 $this->yyval = ''; 
            },
            21 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            22 => function ($yysp) {
                 $this->yyval = []; 
            },
            23 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            24 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            25 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            26 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            27 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            28 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            29 => function ($yysp) {
                 $this->yyval = []; 
            },
            30 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            31 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            32 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            33 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => $this->yyastk[$yysp - (6 - 3)],

                'editable' => $this->yyastk[$yysp - (6 - 2)],
                'direct'   => ($this->yyastk[$yysp - (6 - 1)] & 1) !== 0,

                'type' => $this->yyastk[$yysp - (6 - 4)],

                'directDefining' => ($this->yyastk[$yysp - (6 - 5)]['assign'] & 2) !== 0,
                'filterDefault'  => ($this->yyastk[$yysp - (6 - 5)]['assign'] & 1) !== 0,
                'default'        => is_null($this->yyastk[$yysp - (6 - 5)]['value'])?
					null: $this->parseDefval($this->yyastk[$yysp - (6 - 5)]['value'])
            ]);
		
            },
            34 => function ($yysp) {
                 $this->yyval = 0; 
            },
            35 => function ($yysp) {
                 $this->yyval = 1; 
            },
            36 => function ($yysp) {
                 $this->yyval = false; 
            },
            37 => function ($yysp) {
                 $this->yyval = true; 
            },
            38 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            39 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            40 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (1 - 1)], false); 
            },
            41 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (2 - 1)], true); 
            },
            42 => function ($yysp) {
                 $this->yyval = ['assign' => 1, 'value' => null]; 
            },
            43 => function ($yysp) {
                
            $this->yyval = [
                'assign' => $this->yyastk[$yysp - (2 - 1)],
                'value'  => $this->yyastk[$yysp - (2 - 2)],
            ];
		
            },
            44 => function ($yysp) {
                 $this->yyval = 1; 
            },
            45 => function ($yysp) {
                 $this->yyval = 0; 
            },
            46 => function ($yysp) {
                 $this->yyval = 2; 
            },
            47 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            48 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            49 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            50 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            51 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            52 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            53 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            55 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            56 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            57 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            58 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            59 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            60 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            61 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            62 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            63 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            64 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            65 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            66 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            67 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            68 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            69 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            70 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            71 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            72 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            73 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            74 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            75 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            76 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            77 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            78 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            79 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            80 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            81 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            82 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            83 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            84 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            85 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            86 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            87 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            88 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            89 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            90 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            97 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            98 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            99 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            100 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            101 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            102 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
        ];
    }

    public function parseDefval(string $value): Node\Expr {
        static $parser = null;

        if (is_null($parser)) {
            $parser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        }

        return $parser->parse("<?php $value;")[0]->expr;
    }
}
