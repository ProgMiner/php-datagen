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
    const YYNONTERMS = 30;

    const YYLAST = 135;

    const YY2TBLSTATE = 51;

    const YYGLAST = 44;

    const YYSTATES = 138;
    const YYNLSTATES = 84;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   20,   43,   43,   24,   33,   27,   43,
           25,   26,   30,   28,   16,   29,   32,   31,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   22,   21,
           36,   23,   37,   17,   39,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   40,   15,   41,   35,   43,   42,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   43,   43,   43,   43,   43,   43,   43,
           43,   43,   43,   18,   34,   19,   38,   43,   43,   43,
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
           86,   87,   88,  123,  -21,   85,  133,  135,  186,   66,
           51,    0,   83,  174,   21,   81,  109,   22,   23,   18,
           49,   24,   25,   26,   86,   87,   88,  154,  153,   85,
          138,   47,   27,   28,   19,   32,   29,   78,   33,  187,
          131,  132,   34,   35,   36,   79,  147,  148,  149,   80,
          152,   59,   60,  138,  130,  124,  125,   38,   32,  183,
           78,   33,   53,  104,   54,   34,   35,   36,   79,  147,
          148,  149,   80,  152,   59,   60,  138,   37,   67,   50,
           82,   32,   52,   78,   33,  179,  121,   39,   34,   35,
           36,   79,  147,  148,  149,   80,  152,   59,   60,  138,
           91,   92,   93,   94,   32,  113,   78,   33,   48,  176,
           41,   34,   35,   36,   79,  147,  148,  149,   80,  152,
           59,   60,   40,   44,   45,   30,  155,  160,  140,  170,
          177,   42,    0,   31,   43
    ];

    protected $yycheck = [
            6,    7,    8,    6,    0,   11,   12,   13,   14,    2,
            3,    0,   18,   23,   20,   23,   19,   23,   24,   25,
            4,   27,   28,   29,    6,    7,    8,   37,   36,   11,
           15,    5,   38,   39,   40,   20,   42,   22,   23,   14,
            9,   10,   27,   28,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   15,   23,    7,    8,   42,   20,   21,
           22,   23,   15,   17,   15,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   15,   16,   11,   16,
           18,   20,   15,   22,   23,   19,   21,   23,   27,   28,
           29,   30,   31,   32,   33,   34,   35,   36,   37,   15,
            2,    3,    4,    5,   20,   20,   22,   23,   22,   22,
           27,   27,   28,   29,   30,   31,   32,   33,   34,   35,
           36,   37,   23,   23,   23,   28,   30,   34,   26,   37,
           41,   28,   -1,   29,   29
    ];

    protected $yybase = [
            0,   61,   38,   84,   84,   84,   84,   84,   84,   84,
           84,   84,   15,   84,   84,   84,   84,   66,   -6,   -6,
           -6,   -6,   -6,   -6,   -6,   97,  104,   -6,   -6,   -6,
           97,  104,   64,   99,   83,  103,  105,   -6,   -6,  100,
          101,   -6,   97,  104,   -6,   -6,   98,   67,   67,   67,
           67,   18,   18,   18,   18,   31,   -3,    7,   48,   -8,
          -10,    4,   16,   26,   86,   11,   85,   47,   49,   62,
           49,   63,   49,   46,   65,   25,  102,   89,   87,   96,
           93,   92,    0,    0,    0,   -6,   -6,   -6,   -6,   -6,
           -6,   -6,   -6,   -6,   -6,   -6,   -6,   -6,   -6,   -6,
           -6,   -6,    0,    0,    0,    0,    0,    0,    0,   -6,
           -6,    0,    0,    0,   -6,   -6,   -6,   -6,   -6,   -6,
           -6,    0,    0,   -6,   -6,    0,   -6,   -6,    0,    0,
           18,   18,   18,   18,   18
    ];

    protected $yydefault = [
           22,   97,32767,   45,   80,   58,   53,   59,   78,   79,
           81,   91,32767,   55,   74,   75,   98,32767,   96,   96,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,   57,   66,   60,   61,32767,   94,   85,
           84,   77,   72,   73,   83,   82,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,   44,   38,32767,32767,   87,
           89,   26,   30,   32,   42,32767,   28,    1,   14,32767,
           15,   33,   16,   19,32767,   52,32767,32767,32767,   62,
           67,   88,   34,  100
    ];

    protected $yygoto = [
            2,    1,    1,    3,    4,    5,    6,    7,    8,    9,
           10,   11,   12,   14,   15,    4,    5,    7,    8,    9,
           16,   12,    5,    5,    7,   14,   15,    5,    5,   77,
           90,   96,   96,   96,   96,   89,   96,   96,   97,   73,
          115,  102,   70,   72
    ];

    protected $yygcheck = [
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   27,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    7,
            7,    7,    6,    6
    ];

    protected $yygbase = [
            0,    0,  -16,    0,    0,    0,  -10,   -9,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,  -17,    0,   10,    0,    0
    ];

    protected $yygdefault = [
        -32768,   65,  134,   62,   95,   64,   68,  101,   71,  127,
           61,  107,  108,   57,   63,   69,   56,  111,  119,  120,
           58,   46,   55,   74,   20,   13,   75,   76,   17,  185
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    7,    8,    8,    9,
            9,    1,   10,   10,   11,   12,   13,   13,   17,   17,
           14,   14,   15,   15,   16,   16,   18,   19,   20,   20,
           21,   21,   22,   22,   23,   23,   24,   24,   24,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   25,   25,   25,   25,
           25,   25,   25,   25,   25,   25,   27,   27,   27,   29,
           28,   28,   26,   26
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    3,    1,    3,    1,
            2,    1,    0,    2,    1,    8,    0,    2,    1,    2,
            0,    2,    0,    2,    0,    2,    1,    6,    0,    1,
            1,    1,    0,    2,    0,    2,    1,    1,    1,    1,
            1,    1,    1,    2,    2,    2,    3,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    3,
            3,    3,    3,    3,    3,    3,    3,    3,    2,    2,
            2,    2,    4,    4,    3,    3,    4,    2,    3,    2,
            3,    2,    3,    3,    3,    3,    0,    1,    3,    2,
            0,    2,    1,    2
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
                 $this->yyval = new Node\Identifier($this->yyastk[$yysp - (1 - 1)]); 
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
                 $this->yyval = new Node\Identifier($this->yyastk[$yysp - (1 - 1)]); 
            },
            12 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            13 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            14 => function ($yysp) {
                 $this->yyval = new Node\Name($this->yyastk[$yysp - (1 - 1)]); 
            },
            15 => function ($yysp) {
                 $this->yyval = new Node\Name\FullyQualified($this->yyastk[$yysp - (2 - 2)]); 
            },
            16 => function ($yysp) {
                
            // Hack for emulate T_NAMESPACE token

            if (strtolower($this->yyastk[$yysp - (3 - 1)]) === 'namespace') {
                $this->yyval = new Node\Name\Relative($this->yyastk[$yysp - (3 - 3)]);
            } else {
                $this->yyval = new Node\Name(array_merge([$this->yyastk[$yysp - (3 - 1)]], $this->yyastk[$yysp - (3 - 3)]));
            }
		
            },
            17 => function ($yysp) {
                 $this->yyval = [$this->yyastk[$yysp - (1 - 1)]]; 
            },
            18 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (3 - 1)], [$this->yyastk[$yysp - (3 - 3)]]); 
            },
            19 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (1 - 1)], false); 
            },
            20 => function ($yysp) {
                 $this->yyval = new Type($this->yyastk[$yysp - (2 - 1)], true); 
            },
            21 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            22 => function ($yysp) {
                 $this->yyval = []; 
            },
            23 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            24 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            25 => function ($yysp) {
                
            $this->yyval = new Model\Class_([
                'name' => $this->yyastk[$yysp - (8 - 3)],

                'flags' => $this->yyastk[$yysp - (8 - 1)],

                'extends'    => $this->yyastk[$yysp - (8 - 4)],
                'implements' => $this->yyastk[$yysp - (8 - 5)],

                'fields' => $this->yyastk[$yysp - (8 - 7)]
            ]);
		
            },
            26 => function ($yysp) {
                 $this->yyval = 0; 
            },
            27 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            28 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL; 
            },
            29 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL_FINAL; 
            },
            30 => function ($yysp) {
                 $this->yyval = null; 
            },
            31 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            32 => function ($yysp) {
                 $this->yyval = []; 
            },
            33 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            34 => function ($yysp) {
                 $this->yyval = []; 
            },
            35 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            36 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            37 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => $this->yyastk[$yysp - (6 - 3)],

                'flags' => $this->yyastk[$yysp - (6 - 1)] | $this->yyastk[$yysp - (6 - 2)] | $this->yyastk[$yysp - (6 - 5)]['assign'],

                'type' => $this->yyastk[$yysp - (6 - 4)],

                'default' => is_null($this->yyastk[$yysp - (6 - 5)]['value'])?
                    null: static::parseDefval($this->yyastk[$yysp - (6 - 5)]['value'])
            ]);
		
            },
            38 => function ($yysp) {
                 $this->yyval = 0; 
            },
            39 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_DIRECT; 
            },
            40 => function ($yysp) {
                 $this->yyval = 0; 
            },
            41 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_EDITABLE; 
            },
            42 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            43 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            44 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            45 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (2 - 1)], 'value'  => $this->yyastk[$yysp - (2 - 2)]]; 
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
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
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
                 $this->yyval = ''; 
            },
            101 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            102 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            103 => function ($yysp) {
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
