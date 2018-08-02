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
    const YYNONTERMS = 27;

    const YYLAST = 173;

    const YY2TBLSTATE = 66;

    const YYGLAST = 53;

    const YYSTATES = 143;
    const YYNLSTATES = 90;
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
           98,   99,  100,  101,  102,  103,  104,   -1,  126,  127,
           97,  140,  143,  194,   21,   25,   26,   57,  135,  136,
          181,  139,   27,   35,   29,   22,    0,   30,   31,   32,
           38,   28,  134,   72,   86,  161,   39,   54,   33,   34,
           23,   40,   41,   42,   87,  154,  155,  156,   88,  159,
           66,   67,   38,   56,   52,  195,   86,  125,   39,   20,
           68,   89,  186,   40,   41,   42,   87,  154,  155,  156,
           88,  159,   66,   67,   38,  160,   96,   58,   86,  107,
           39,   49,   57,  123,   55,   40,   41,   42,   87,  154,
          155,  156,   88,  159,   66,   67,   38,  -48,  131,  190,
           86,   53,   39,  183,   44,  147,   45,   40,   41,   42,
           87,  154,  155,  156,   88,  159,   66,   67,   38,   50,
           43,   51,   86,   46,   39,  162,   36,  167,   47,   40,
           41,   42,   87,  154,  155,  156,   88,  159,   66,   67,
           38,   37,   48,  177,   86,  184,   39,    0,    0,    0,
            0,   40,   41,   42,   87,  154,  155,  156,   88,  159,
           66,   67,   98,   99,  100,  101,  102,  103,  104,    0,
            0,    0,   97
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    0,    7,    8,
           12,   13,   14,   15,   16,    9,   18,   19,   10,   11,
           24,    9,   24,   25,   26,   27,    0,   29,   30,   31,
           18,   25,   24,    2,   22,   39,   24,    4,   40,   41,
           42,   29,   30,   31,   32,   33,   34,   35,   36,   37,
           38,   39,   18,    3,    5,   15,   22,    6,   24,   25,
           16,   24,   17,   29,   30,   31,   32,   33,   34,   35,
           36,   37,   38,   39,   18,   38,   17,   19,   22,   18,
           24,   25,   19,   21,   20,   29,   30,   31,   32,   33,
           34,   35,   36,   37,   38,   39,   18,   21,   23,   21,
           22,   22,   24,   22,   24,   28,   24,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   18,   24,
           20,   24,   22,   29,   24,   32,   30,   36,   30,   29,
           30,   31,   32,   33,   34,   35,   36,   37,   38,   39,
           18,   31,   31,   39,   22,   43,   24,   -1,   -1,   -1,
           -1,   29,   30,   31,   32,   33,   34,   35,   36,   37,
           38,   39,    2,    3,    4,    5,    6,    7,    8,   -1,
           -1,   -1,   12
    ];

    protected $yybase = [
           31,   12,   78,  100,  122,  122,  122,   34,  122,  122,
          122,  122,  122,  122,  122,   56,  122,  122,  122,    6,
           76,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   96,  110,   -2,   -2,   -2,   96,  110,   80,   82,
           94,   98,  111,   -2,   95,   97,   -2,   96,  110,   -2,
           -2,   -2,   63,   63,   63,   63,  160,  160,  160,  160,
            8,    7,   49,   59,    1,   75,   37,   -4,   51,   49,
           33,   79,   61,   26,   50,   44,   58,   58,   64,   58,
           62,   58,   40,   45,   77,  102,   81,   93,   91,  104,
            0,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,   -2,
           -2,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,   -2,   -2,    0,    0,    0,   -2,   -2,   -2,   -2,
           -2,   -2,   -2,    0,   -2,   -2,    0,   -2,   -2,    0,
            0,    0,  160,  160,  160,  160,    0,    0,    0,    0,
            0,   31,   33,   51,    0,   58
    ];

    protected $yydefault = [
            4,32767,32767,   98,   47,   81,   59,32767,   55,   60,
           79,   80,   82,   92,   56,32767,   75,   76,   99,32767,
           95,  101,   97,   97,  102,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,   58,
           67,   61,   62,32767,   86,   85,   78,   73,   74,   95,
           84,   83,32767,32767,32767,32767,32767,32767,32767,32767,
           42,   15,   20,   34,32767,   40,   88,   90,   29,   22,
           20,   38,   16,32767,32767,32767,   21,   27,   23,   28,
        32767,   52,   54,32767,32767,32767,32767,   63,   68,   89
    ];

    protected $yygoto = [
            4,   15,    2,    3,    3,    2,    1,    5,    6,    7,
            8,    9,   10,   11,   12,   13,   15,   16,   17,    5,
            6,    9,   10,   11,   18,    6,    6,    9,   16,   17,
           15,    6,    6,   85,  114,  114,  114,  114,   62,  115,
          116,   71,   77,   65,   76,   79,  193,   93,  120,  109,
            0,    0,  108
    ];

    protected $yygcheck = [
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   22,
           22,   22,   22,   24,    6,    6,    6,    6,    6,    6,
            6,    6,   11,   11,   11,   11,   26,    3,   13,    9,
           -1,   -1,   10
    ];

    protected $yygbase = [
            0,    0,    0,  -14,    0,    0,  -18,    0,    0,  -21,
          -17,  -10,    0,  -20,    0,    0,    0,    0,    0,    0,
            0,    0,  -19,    0,   10,    0,   22
    ];

    protected $yygdefault = [
        -32768,   73,   61,   92,   95,   74,  114,   75,   63,   69,
           70,   81,   78,  121,  122,   64,   59,   60,   80,  129,
           19,  133,   14,   82,   84,   83,   24
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
           22,   22,   22,   22,   22,   22,   22,   24,   24,   24,
           26,   25,   25,   25,   23,   23
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
            2,    3,    2,    3,    3,    3,    3,    0,    1,    3,
            2,    0,    1,    2,    1,    2
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
                 $this->yyval = ''; 
            },
            98 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            99 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            100 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            101 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            102 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            103 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            104 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            105 => function ($yysp) {
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
