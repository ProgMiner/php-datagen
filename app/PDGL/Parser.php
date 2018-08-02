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

    const YYBADCH = 44;
    const YYMAXLEX = 271;
    const YYTERMS = 44;
    const YYNONTERMS = 24;

    const YYLAST = 196;

    const YY2TBLSTATE = 64;

    const YYGLAST = 47;

    const YYSTATES = 136;
    const YYNLSTATES = 85;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   18,   44,   44,   26,   35,   29,   44,
           27,   28,   32,   30,   20,   31,   34,   33,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   22,   21,
           38,   24,   39,   23,   41,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   42,   19,   43,   37,   44,   25,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   16,   36,   17,   40,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,   44,   44,   44,   44,
           44,   44,   44,   44,   44,   44,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           15
    ];

    protected $yyaction = [
           93,   94,   95,   96,   97,   98,   99,   -1,  121,  122,
           92,  135,  138,  182,   22,   21,   23,   55,  130,  131,
          176,  134,   24,   34,   26,   27,    0,   28,   29,   30,
           37,   25,  129,   70,   81,  156,   38,   52,   31,   32,
           33,   39,   40,   41,   82,  149,  150,  151,   83,  154,
           64,   65,   37,   54,   50,  183,   81,  120,   38,   66,
          102,   91,   84,   39,   40,   41,   82,  149,  150,  151,
           83,  154,   64,   65,  181,   37,  155,  179,   56,   81,
           55,   38,   53,  126,  118,  -48,   39,   40,   41,   82,
          149,  150,  151,   83,  154,   64,   65,   37,   51,  178,
           44,   81,   42,   38,   20,   43,   48,   49,   39,   40,
           41,   82,  149,  150,  151,   83,  154,   64,   65,   37,
           35,   45,  162,   81,   36,   38,   46,  172,  157,  142,
           39,   40,   41,   82,  149,  150,  151,   83,  154,   64,
           65,   37,    0,    0,    0,   81,    0,   38,   47,    0,
            0,    0,   39,   40,   41,   82,  149,  150,  151,   83,
          154,   64,   65,   37,    0,    0,    0,   81,    0,   38,
            0,    0,    0,    0,   39,   40,   41,   82,  149,  150,
          151,   83,  154,   64,   65,   93,   94,   95,   96,   97,
           98,   99,    0,    0,    0,   92
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    0,    7,    8,
           12,   13,   14,   15,   16,    9,   18,   19,   10,   11,
           24,    9,   24,   25,   26,   27,    0,   29,   30,   31,
           18,   25,   24,    2,   22,   39,   24,    4,   40,   41,
           42,   29,   30,   31,   32,   33,   34,   35,   36,   37,
           38,   39,   18,    3,    5,   15,   22,    6,   24,   16,
           18,   17,   24,   29,   30,   31,   32,   33,   34,   35,
           36,   37,   38,   39,   17,   18,   38,   43,   19,   22,
           19,   24,   20,   23,   21,   21,   29,   30,   31,   32,
           33,   34,   35,   36,   37,   38,   39,   18,   22,   22,
           29,   22,   24,   24,   25,   24,   24,   24,   29,   30,
           31,   32,   33,   34,   35,   36,   37,   38,   39,   18,
           30,   30,   36,   22,   31,   24,   31,   39,   32,   28,
           29,   30,   31,   32,   33,   34,   35,   36,   37,   38,
           39,   18,   -1,   -1,   -1,   22,   -1,   24,   25,   -1,
           -1,   -1,   29,   30,   31,   32,   33,   34,   35,   36,
           37,   38,   39,   18,   -1,   -1,   -1,   22,   -1,   24,
           -1,   -1,   -1,   -1,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39,    2,    3,    4,    5,    6,
            7,    8,   -1,   -1,   -1,   12
    ];

    protected $yybase = [
           31,   12,   57,  101,   34,  145,  145,  145,   79,  145,
          145,  145,  145,  145,  145,  145,  123,  145,  145,    6,
           64,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   90,
           93,   -2,   -2,   -2,   -2,   90,   93,   78,   81,   71,
           91,   95,   82,   83,   -2,   90,   93,   -2,   -2,   -2,
           61,   61,   61,   61,  183,  183,  183,  183,    8,    7,
           49,   44,    1,   60,   38,   -4,   51,   49,   33,   76,
           42,   26,   50,   43,   59,   59,   62,   59,   63,   59,
           40,   77,   96,   86,   88,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,    0,    0,    0,    0,
            0,    0,    0,    0,   -2,   -2,    0,    0,    0,    0,
           -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,    0,
           -2,   -2,    0,    0,    0,  183,  183,  183,  183,    0,
            0,    0,    0,    0,   31,   33,   51,    0,   59
    ];

    protected $yydefault = [
            4,32767,32767,32767,32767,   47,   81,   59,32767,   55,
           60,   79,   80,   82,   92,   56,32767,   75,   76,32767,
           95,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   58,   67,
           61,   62,   86,   85,   78,   73,   74,   95,   84,   83,
        32767,32767,32767,32767,32767,32767,32767,32767,   42,   15,
           20,   34,32767,   40,   88,   90,   29,   22,   20,   38,
           16,32767,32767,32767,   21,   27,   23,   28,32767,   52,
           54,32767,   63,   68,   89
    ];

    protected $yygoto = [
            5,   16,    1,    2,    6,    7,    8,    9,    3,   10,
           11,   12,   13,   14,    4,   16,   17,   18,    6,    7,
           10,   11,   12,    7,    7,   10,   17,   18,   16,    7,
            7,   88,  109,  109,  109,  109,   60,  110,  111,   69,
           75,   63,   74,   77,  115,  104,  103
    ];

    protected $yygcheck = [
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,    3,    6,    6,    6,    6,    6,    6,    6,    6,
           11,   11,   11,   11,   13,    9,   10
    ];

    protected $yygbase = [
            0,    0,    0,  -28,    0,    0,  -18,    0,    0,  -23,
          -21,  -10,    0,  -22,    0,    0,    0,    0,    0,    0,
            0,    0,  -19,    0
    ];

    protected $yygdefault = [
        -32768,   71,   59,   87,   90,   72,  109,   73,   61,   67,
           68,   79,   76,  116,  117,   62,   57,   58,   78,  124,
           19,  128,   15,   80
    ];

    protected $yylhs = [
            0,    1,    2,    2,    2,    3,    4,    6,    6,    6,
            6,    6,    6,    6,    6,    5,    5,    5,    7,    7,
            9,    9,   10,   10,   11,   11,   11,   12,   12,    8,
            8,    8,   13,   14,   15,   15,   16,   16,   17,   17,
           19,   19,   18,   18,   20,   20,   20,   21,   21,   21,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   23,   23
    ];

    protected $yylen = [
            1,    1,    1,    2,    0,    1,    7,    1,    1,    1,
            1,    1,    1,    1,    1,    0,    1,    2,    2,    2,
            0,    2,    0,    2,    1,    2,    3,    1,    3,    0,
            1,    2,    1,    6,    0,    1,    1,    1,    0,    2,
            1,    2,    0,    2,    1,    1,    1,    1,    3,    3,
            1,    1,    1,    1,    1,    2,    2,    3,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            3,    3,    3,    3,    3,    3,    3,    3,    3,    2,
            2,    2,    2,    4,    4,    3,    3,    4,    2,    3,
            2,    3,    2,    3,    3,    3,    3,    1,    2
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 2)]; 
            },
            49 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 2)]; 
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            55 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            56 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            57 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            83 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            84 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            85 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            86 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            87 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (4 - 1)].$this->yyastk[$yysp - (4 - 2)].$this->yyastk[$yysp - (4 - 3)].$this->yyastk[$yysp - (4 - 4)]; 
            },
            88 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            89 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            90 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            91 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            92 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            97 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            98 => function ($yysp) {
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
