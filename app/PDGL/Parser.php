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
    const YYNONTERMS = 23;

    const YYLAST = 175;

    const YY2TBLSTATE = 58;

    const YYGLAST = 38;

    const YYSTATES = 128;
    const YYNLSTATES = 84;
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
          100,  126,  129,  173,   21,   20,   22,   69,  121,  122,
          167,  125,   23,   32,   77,   25,  100,   26,   27,   28,
           35,   24,  120,   69,   80,  147,   36,   -1,   29,   30,
           31,   37,   38,   39,   81,  140,  141,  142,   82,  145,
           58,   59,   35,  112,  113,    0,   80,   67,   36,  111,
           64,   52,   83,   37,   38,   39,   81,  140,  141,  142,
           82,  145,   58,   59,  172,   35,  146,  170,   54,   80,
           50,   36,   63,  101,  102,  131,   37,   38,   39,   81,
          140,  141,  142,   82,  145,   58,   59,   35,  174,   90,
           60,   80,  109,   36,   19,   93,   55,   73,   37,   38,
           39,   81,  140,  141,  142,   82,  145,   58,   59,   35,
          -40,  117,   53,   80,  169,   36,   42,   40,   41,  133,
           37,   38,   39,   81,  140,  141,  142,   82,  145,   58,
           59,   35,   46,   47,   33,   80,   43,   36,   45,  148,
          163,   34,   37,   38,   39,   81,  140,  141,  142,   82,
          145,   58,   59,   35,   44,  153,    0,   80,    0,   36,
            0,    0,    0,    0,   37,   38,   39,   81,  140,  141,
          142,   82,  145,   58,   59
    ];

    protected $yycheck = [
           12,   13,   14,   15,   16,    9,   18,   19,   10,   11,
           24,    9,   24,   25,   26,   27,   12,   29,   30,   31,
           18,   25,   24,   19,   22,   39,   24,    0,   40,   41,
           42,   29,   30,   31,   32,   33,   34,   35,   36,   37,
           38,   39,   18,    7,    8,    0,   22,    3,   24,    6,
            2,    5,   24,   29,   30,   31,   32,   33,   34,   35,
           36,   37,   38,   39,   17,   18,   38,   43,    4,   22,
           12,   24,   12,   12,   12,   12,   29,   30,   31,   32,
           33,   34,   35,   36,   37,   38,   39,   18,   15,   17,
           16,   22,   21,   24,   25,   18,   20,   19,   29,   30,
           31,   32,   33,   34,   35,   36,   37,   38,   39,   18,
           21,   23,   22,   22,   22,   24,   29,   24,   24,   28,
           29,   30,   31,   32,   33,   34,   35,   36,   37,   38,
           39,   18,   24,   24,   30,   22,   30,   24,   25,   32,
           39,   31,   29,   30,   31,   32,   33,   34,   35,   36,
           37,   38,   39,   18,   31,   36,   -1,   22,   -1,   24,
           -1,   -1,   -1,   -1,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39
    ];

    protected $yybase = [
           48,    2,   47,   91,   24,  135,  135,  135,   69,  135,
          135,  135,  135,  135,  135,  113,  135,  135,   -4,   89,
          -12,  -12,  -12,  -12,  -12,  -12,  -12,  104,  110,  -12,
          -12,  -12,  -12,  104,  110,   93,   94,   87,  106,  123,
          108,  109,  -12,  104,  110,  -12,  -12,  -12,   -2,   27,
           46,   72,    4,    4,    4,    4,   36,   88,   28,  -14,
           43,   46,   64,   90,   77,   45,   44,   58,   74,   61,
           78,   78,   76,   62,   78,   60,   71,   63,   78,   73,
           92,  107,  119,  101,    0,  -12,  -12,  -12,  -12,  -12,
          -12,  -12,  -12,  -12,  -12,  -12,  -12,  -12,  -12,  -12,
          -12,  -12,  -12,  -12,    0,    0,    0,    0,    0,    0,
            0,  -12,  -12,    0,    0,    0,    0,  -12,  -12,  -12,
          -12,  -12,  -12,  -12,  -12,  -12,    0,  -12,  -12,    0,
            0,    0,    0,   48,   64,   43,    0,    0,    0,    0,
            0,   78
    ];

    protected $yydefault = [
            4,32767,32767,32767,32767,   39,   73,   51,32767,   52,
           71,   72,   74,   84,   48,32767,   67,   68,32767,   87,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,   50,   59,   53,   54,
           78,   77,   70,   65,   66,   87,   76,   75,   34,    7,
           12,   26,32767,32767,32767,32767,32767,   32,   80,   82,
           21,   14,   12,   30,    8,32767,32767,32767,32767,32767,
           13,   19,   15,32767,   20,32767,32767,32767,   44,   46,
        32767,   55,   60,   81
    ];

    protected $yygoto = [
            5,   15,    1,    2,    6,    7,    8,    3,    9,   10,
           11,   12,   13,    4,   15,   16,   17,    6,    7,    9,
           10,   11,    7,    7,    9,   16,   17,   15,    7,    7,
           71,   57,   70,   74,   87,  106,   95,   94
    ];

    protected $yygcheck = [
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           10,   10,   10,   10,    3,   12,    8,    9
    ];

    protected $yygbase = [
            0,    0,    0,  -15,    0,    0,    0,    0,  -26,  -24,
          -22,    0,  -25,    0,    0,    0,    0,    0,    0,    0,
            0,  -18,    0
    ];

    protected $yygdefault = [
        -32768,   65,   49,   86,   89,   66,   68,   51,   61,   62,
           78,   72,  107,  108,   56,   75,   48,   76,  115,   18,
          119,   14,   79
    ];

    protected $yylhs = [
            0,    1,    2,    2,    2,    3,    4,    5,    5,    5,
            6,    6,    8,    8,    9,    9,   10,   10,   10,   11,
           11,    7,    7,    7,   12,   13,   14,   14,   15,   15,
           16,   16,   18,   18,   17,   17,   19,   19,   19,   20,
           20,   20,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   22,
           22
    ];

    protected $yylen = [
            1,    1,    1,    2,    0,    1,    7,    0,    1,    2,
            2,    2,    0,    2,    0,    2,    1,    2,    3,    1,
            3,    0,    1,    2,    1,    6,    0,    1,    1,    1,
            0,    2,    1,    2,    0,    2,    1,    1,    1,    1,
            3,    3,    1,    1,    1,    1,    1,    2,    2,    3,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    3,    3,    3,    3,    3,    3,    3,    3,
            3,    2,    2,    2,    2,    4,    4,    3,    3,    4,
            2,    3,    2,    3,    2,    3,    3,    3,    3,    1,
            2
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
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            3 => function ($yysp) {
                 $this->yyval = array_merge(($this->yyastk[$yysp - (2 - 1)] ?? ''), [($this->yyastk[$yysp - (2 - 2)] ?? '')]); 
            },
            4 => function ($yysp) {
                 $this->yyval = []; 
            },
            5 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            6 => function ($yysp) {
                
            $this->yyval = new Model\Class_([
                'name' => ($this->yyastk[$yysp - (7 - 3)] ?? ''),

                'data'       => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 4) !== 0,
                'final'      => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 1) !== 0,
                'finalFinal' => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 2) !== 0,

                'extends'    => ($this->yyastk[$yysp - (7 - 4)] ?? '')['extends'],
                'implements' => ($this->yyastk[$yysp - (7 - 4)] ?? '')['implements'],

                'fields' => ($this->yyastk[$yysp - (7 - 6)] ?? '')
            ]);
		
            },
            7 => function ($yysp) {
                 $this->yyval = 0; 
            },
            8 => function ($yysp) {
                 $this->yyval = 1; 
            },
            9 => function ($yysp) {
                 $this->yyval = 3; 
            },
            10 => function ($yysp) {
                 $this->yyval = ['extends' => ($this->yyastk[$yysp - (2 - 1)] ?? ''), 'implements' => ($this->yyastk[$yysp - (2 - 2)] ?? '')]; 
            },
            11 => function ($yysp) {
                 $this->yyval = ['extends' => ($this->yyastk[$yysp - (2 - 2)] ?? ''), 'implements' => ($this->yyastk[$yysp - (2 - 1)] ?? '')]; 
            },
            12 => function ($yysp) {
                 $this->yyval = null; 
            },
            13 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            14 => function ($yysp) {
                 $this->yyval = []; 
            },
            15 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            16 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            17 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? '').($this->yyastk[$yysp - (2 - 1)] ?? ''); 
            },
            18 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            19 => function ($yysp) {
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            20 => function ($yysp) {
                 $this->yyval = array_merge(($this->yyastk[$yysp - (3 - 1)] ?? ''), [($this->yyastk[$yysp - (3 - 3)] ?? '')]); 
            },
            21 => function ($yysp) {
                 $this->yyval = []; 
            },
            22 => function ($yysp) {
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            23 => function ($yysp) {
                 $this->yyval = array_merge(($this->yyastk[$yysp - (2 - 1)] ?? ''), [($this->yyastk[$yysp - (2 - 2)] ?? '')]); 
            },
            24 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            25 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => ($this->yyastk[$yysp - (6 - 3)] ?? ''),

                'editable' => ($this->yyastk[$yysp - (6 - 2)] ?? ''),
                'direct'   => (($this->yyastk[$yysp - (6 - 1)] ?? '') & 1) !== 0,

                'type' => ($this->yyastk[$yysp - (6 - 4)] ?? ''),

                'directDefining' => (($this->yyastk[$yysp - (6 - 5)] ?? '')['assign'] & 2) !== 0,
                'filterDefault'  => (($this->yyastk[$yysp - (6 - 5)] ?? '')['assign'] & 1) !== 0,
                'default'        => is_null(($this->yyastk[$yysp - (6 - 5)] ?? '')['value'])?
					null: $this->parseDefval(($this->yyastk[$yysp - (6 - 5)] ?? '')['value'])
            ]);
		
            },
            26 => function ($yysp) {
                 $this->yyval = 0; 
            },
            27 => function ($yysp) {
                 $this->yyval = 1; 
            },
            28 => function ($yysp) {
                 $this->yyval = false; 
            },
            29 => function ($yysp) {
                 $this->yyval = true; 
            },
            30 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            31 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            32 => function ($yysp) {
                 $this->yyval = new Type(($this->yyastk[$yysp - (1 - 1)] ?? ''), false); 
            },
            33 => function ($yysp) {
                 $this->yyval = new Type(($this->yyastk[$yysp - (2 - 1)] ?? ''), true); 
            },
            34 => function ($yysp) {
                 $this->yyval = ['assign' => 1, 'value' => null]; 
            },
            35 => function ($yysp) {
                
            $this->yyval = [
                'assign' => ($this->yyastk[$yysp - (2 - 1)] ?? ''),
                'value'  => ($this->yyastk[$yysp - (2 - 2)] ?? ''),
            ];
		
            },
            36 => function ($yysp) {
                 $this->yyval = 1; 
            },
            37 => function ($yysp) {
                 $this->yyval = 0; 
            },
            38 => function ($yysp) {
                 $this->yyval = 2; 
            },
            39 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            40 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 2)] ?? ''); 
            },
            41 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 2)] ?? ''); 
            },
            42 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            43 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            44 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            45 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            46 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            47 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            48 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            49 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            50 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            51 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            52 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            53 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            54 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            55 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            56 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            57 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            58 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            59 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            60 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            61 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            62 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            63 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            64 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            65 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            66 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            67 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            68 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            69 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            70 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            71 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            72 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            73 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            74 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            75 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (4 - 1)] ?? '').($this->yyastk[$yysp - (4 - 2)] ?? '').($this->yyastk[$yysp - (4 - 3)] ?? '').($this->yyastk[$yysp - (4 - 4)] ?? ''); 
            },
            76 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (4 - 1)] ?? '').($this->yyastk[$yysp - (4 - 2)] ?? '').($this->yyastk[$yysp - (4 - 3)] ?? '').($this->yyastk[$yysp - (4 - 4)] ?? ''); 
            },
            77 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            78 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            79 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (4 - 1)] ?? '').($this->yyastk[$yysp - (4 - 2)] ?? '').($this->yyastk[$yysp - (4 - 3)] ?? '').($this->yyastk[$yysp - (4 - 4)] ?? ''); 
            },
            80 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            81 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            82 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            83 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            84 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            85 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            86 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            87 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            88 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').($this->yyastk[$yysp - (3 - 2)] ?? '').($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            89 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            90 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? '').($this->yyastk[$yysp - (2 - 2)] ?? ''); 
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
