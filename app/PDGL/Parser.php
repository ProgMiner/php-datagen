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
    const YYNONTERMS = 27;

    const YYLAST = 133;

    const YY2TBLSTATE = 62;

    const YYGLAST = 51;

    const YYSTATES = 138;
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
           93,   94,   95,   96,   97,   98,   99,   84,   68,   92,
          134,  137,  188,   17,  175,   22,   52,  132,  133,   -1,
          154,   23,   24,   18,    0,   25,   26,   27,  155,  123,
          124,  131,   51,   47,   49,   33,   28,   29,   19,   81,
           30,   34,  122,  180,   53,   35,   36,   37,   82,  148,
          149,  150,   83,  153,   62,   63,  189,  104,   33,   64,
           39,  184,   81,   91,   34,   50,   52,  128,   35,   36,
           37,   82,  148,  149,  150,   83,  153,   62,   63,   33,
          120,   38,   48,   81,  177,   34,   42,   40,   41,   35,
           36,   37,   82,  148,  149,  150,   83,  153,   62,   63,
           33,   45,   46,  141,   81,   32,   34,  161,   31,   43,
           35,   36,   37,   82,  148,  149,  150,   83,  153,   62,
           63,   93,   94,   95,   96,   97,   98,   99,   44,  171,
           92,  156,  178
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
           48,  119,  119,  119,  119,    8,   19,   28,   47,   29,
           22,   45,  -16,   -9,   36,   28,   30,   61,   40,   24,
           44,   26,   26,   46,   26,   60,   26,   42,   27,   77,
           91,   63,  101,   73,   92,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   -2,    0,    0,    0,    0,    0,    0,    0,    0,
            0,   -2,   -2,    0,    0,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,    0,    0,   -2,   -2,    0,   -2,   -2,
            0,    0,  119,  119,  119,  119,    0,    0,    0,    0,
            0,    6,   30,   36,    6,    0,   26
    ];

    protected $yydefault = [
            4,32767,   97,   45,   80,   58,   54,   59,   78,   79,
           81,   91,32767,   55,   74,   75,   98,  100,   96,   96,
          101,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,   57,   66,   60,   61,32767,   94,
           85,   84,   77,   72,   73,   83,   82,32767,32767,32767,
        32767,32767,32767,32767,32767,   44,   15,   22,   36,32767,
        32767,   42,   87,   89,   31,   24,   22,   40,   18,32767,
        32767,   23,   29,   25,   30,32767,   51,   53,32767,32767,
        32767,32767,   62,   67,   88
    ];

    protected $yygoto = [
            1,    2,    2,    1,    3,    4,    5,    6,    7,    8,
            9,   10,   11,   12,   14,   15,    4,    5,    7,    8,
            9,   16,   12,    5,    5,    7,   14,   15,    5,    5,
           80,  111,  111,  111,  111,   57,  112,  113,   67,   72,
           61,   71,   74,  187,   88,  102,  117,  106,    0,    0,
          105
    ];

    protected $yygcheck = [
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           24,    6,    6,    6,    6,    6,    6,    6,    6,   12,
           12,   12,   12,   26,    3,    9,   14,   10,   -1,   -1,
           11
    ];

    protected $yygbase = [
            0,    0,    0,  -12,    0,    0,  -16,    0,    0,  -14,
          -19,  -15,   -8,    0,  -18,    0,    0,    0,    0,    0,
            0,    0,  -17,    0,   11,    0,   23
    ];

    protected $yygdefault = [
        -32768,   69,   56,   87,   90,   59,  111,   70,   58,  101,
           65,   66,   76,   73,  118,  119,   60,   54,   55,   75,
          126,   21,   13,   77,   79,   78,   20
    ];

    protected $yylhs = [
            0,    1,    2,    2,    2,    3,    4,    6,    6,    6,
            6,    6,    6,    6,    6,    5,    5,    5,    9,    9,
            7,    7,   10,   10,   11,   11,   12,   12,   12,   13,
           13,    8,    8,    8,   14,   15,   16,   16,   17,   17,
           18,   18,   20,   20,   19,   19,   21,   21,   21,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   24,   24,   24,   26,
           25,   25,   25,   23,   23
    ];

    protected $yylen = [
            1,    1,    1,    2,    0,    1,    7,    1,    1,    1,
            1,    1,    1,    1,    1,    0,    1,    2,    1,    2,
            2,    2,    0,    2,    0,    2,    1,    2,    3,    1,
            3,    0,    1,    2,    1,    6,    0,    1,    1,    1,
            0,    2,    1,    2,    0,    2,    1,    1,    1,    1,
            1,    1,    1,    1,    2,    2,    3,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    3,
            3,    3,    3,    3,    3,    3,    3,    3,    2,    2,
            2,    2,    4,    4,    3,    3,    4,    2,    3,    2,
            3,    2,    3,    3,    3,    3,    0,    1,    3,    2,
            0,    1,    2,    1,    2
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

				'flags' => $this->yyastk[$yysp - (7 - 1)],

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
                 $this->yyval = $this->yyastk[$yysp - (1 - 1)]; 
            },
            17 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            18 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL; 
            },
            19 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL_FINAL; 
            },
            20 => function ($yysp) {
                 $this->yyval = ['extends' => $this->yyastk[$yysp - (2 - 1)], 'implements' => $this->yyastk[$yysp - (2 - 2)]]; 
            },
            21 => function ($yysp) {
                 $this->yyval = ['extends' => $this->yyastk[$yysp - (2 - 2)], 'implements' => $this->yyastk[$yysp - (2 - 1)]]; 
            },
            22 => function ($yysp) {
                 $this->yyval = ''; 
            },
            23 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            24 => function ($yysp) {
                 $this->yyval = []; 
            },
            25 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            26 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            27 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            28 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            29 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            30 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            31 => function ($yysp) {
                 $this->yyval = []; 
            },
            32 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            33 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            34 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            35 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => $this->yyastk[$yysp - (6 - 3)],

				'flags' => $this->yyastk[$yysp - (6 - 1)] | $this->yyastk[$yysp - (6 - 2)] | $this->yyastk[$yysp - (6 - 5)]['assign'],

                'type' => $this->yyastk[$yysp - (6 - 4)],

                'default' => is_null($this->yyastk[$yysp - (6 - 5)]['value'])?
					null: static::parseDefval($this->yyastk[$yysp - (6 - 5)]['value'])
            ]);
		
            },
            36 => function ($yysp) {
                 $this->yyval = 0; 
            },
            37 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_DIRECT; 
            },
            38 => function ($yysp) {
                 $this->yyval = 0; 
            },
            39 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_EDITABLE; 
            },
            40 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            41 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            42 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (1 - 1)], false); 
            },
            43 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (2 - 1)], true); 
            },
            44 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            45 => function ($yysp) {
                
            $this->yyval = [
                'assign' => $this->yyastk[$yysp - (2 - 1)],
                'value'  => $this->yyastk[$yysp - (2 - 2)],
            ];
		
            },
            46 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_FILTER_DEFAULT; 
            },
            47 => function ($yysp) {
                 $this->yyval = 0; 
            },
            48 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_DIRECT_DEFINING; 
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            53 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            54 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            55 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            56 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            68 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            77 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            78 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            79 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            80 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            81 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            82 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            83 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            84 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            85 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            86 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            92 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            93 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            94 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            95 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            96 => function ($yysp) {
                 $this->yyval = ''; 
            },
            97 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            98 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            103 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            104 => function ($yysp) {
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
