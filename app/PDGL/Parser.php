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

    const YYBADCH = 42;
    const YYMAXLEX = 272;
    const YYTERMS = 42;
    const YYNONTERMS = 32;

    const YYLAST = 106;

    const YY2TBLSTATE = 10;

    const YYGLAST = 16;

    const YYSTATES = 131;
    const YYNLSTATES = 56;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    protected $yytranslate = [
            0,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   20,   42,   42,   28,   33,   39,   42,
           26,   27,   31,   34,   16,   35,   36,   32,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   22,   21,
           38,   23,   37,   17,   30,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   24,   15,   25,   40,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   18,   41,   19,   29,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,   42,   42,   42,   42,
           42,   42,   42,   42,   42,   42,    1,    2,    3,    4,
            5,    6,    7,    8,   42,    9,   10,   11,   42,   12,
           13,   14
    ];

    protected $yyaction = [
           63,   64,   65,   66,   58,   59,   60,   97,  154,   57,
          110,  169,  113,  124,  -23,   19,   55,    0,   41,  141,
           83,   42,  119,  120,  121,  122,  123,  125,  126,   20,
           43,   44,   21,   22,   45,   23,   15,   24,   46,   25,
           58,   59,   60,   52,  161,   57,   63,   64,   65,   66,
          105,  106,  160,  146,  155,  156,  152,  149,   53,   32,
           10,  153,  151,   50,  104,   33,  142,   51,  150,   11,
          114,    8,  118,   98,   99,    6,  170,   12,   78,   54,
           13,   95,   48,  165,    9,    0,   76,    0,    0,    0,
            0,   87,    0,    0,    7,    0,   49,  157,  159,  158,
          162,  164,  163,  166,  168,  167
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    6,   23,   11,
           12,   13,   14,   15,    0,   17,   18,    0,   20,   34,
           19,   23,   24,   25,   26,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
            6,    7,    8,   23,   23,   11,    2,    3,    4,    5,
            9,   10,   23,   23,   23,   23,   17,   37,   38,    2,
            3,   22,   41,   31,   23,   11,   35,   37,   39,   15,
           19,    4,   21,    7,    8,    5,   13,   15,   14,   18,
           15,   21,   23,   37,   16,   -1,   17,   -1,   -1,   -1,
           -1,   20,   -1,   -1,   22,   -1,   23,   23,   23,   23,
           23,   23,   23,   23,   23,   23
    ];

    protected $yybase = [
            0,   51,   -2,   -2,   -2,   44,   54,   54,   54,   54,
           34,   34,   34,   34,   41,   20,    1,   57,   66,   39,
           32,  -15,   31,   30,   29,   21,   14,   67,   70,   72,
           64,   17,   71,   62,   65,   61,   65,   68,   65,   69,
           60,   59,   73,   74,   75,   76,   77,   63,   78,   79,
           80,   81,   46,   82,    0,    0,    0,   -2,    0,    0,
            0,   34,   34,   34,   34,   34
    ];

    protected $yydefault = [
           24,32767,32767,   47,   61,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,   46,   79,   40,32767,32767,32767,
           72,   75,   76,   78,   80,   82,   28,   32,   34,   44,
           21,32767,   30,    1,   14,32767,   15,   35,   16,   19,
        32767,   71,   83,   73,   74,   77,   81,   55,   92,   91,
           84,   88,   89,   87,   36,   59
    ];

    protected $yygoto = [
           62,   62,   62,   62,   62,   39,   89,   74,    3,   61,
          108,  108,   69,   36,   38,   67
    ];

    protected $yygcheck = [
            2,    2,    2,    2,    2,    7,    7,    7,   26,    2,
           27,   27,    2,    6,    6,    4
    ];

    protected $yygbase = [
            0,    0,   -1,    0,   10,    0,    2,   -2,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    6,    7,    0,    0,
            0,    0
    ];

    protected $yygdefault = [
        -32768,   31,   68,   27,  109,   29,   34,   73,   37,  101,
            2,   26,   81,   82,   17,   28,   35,   16,   85,   93,
           94,   18,    5,   14,   40,   30,    4,  107,   47,  112,
            1,  116
    ];

    protected $yylhs = [
            0,    2,    2,    2,    2,    3,    4,    4,    4,    4,
            4,    5,    6,    6,    7,    7,    7,    8,    8,    9,
            9,   10,   10,    1,   11,   11,   12,   13,   14,   14,
           18,   18,   15,   15,   16,   16,   17,   17,   19,   20,
           21,   21,   22,   22,   23,   23,   24,   24,   25,   25,
           25,   26,   26,   27,   27,   27,   27,   27,   27,   30,
           30,   31,   31,   29,   29,   29,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,   29,   29,   29,
           29,   29,   29,   28,   28
    ];

    protected $yylen = [
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    3,    1,    2,    3,    1,    3,    1,
            2,    0,    1,    1,    0,    2,    1,    8,    0,    2,
            1,    2,    0,    2,    0,    2,    0,    2,    1,    6,
            0,    1,    1,    1,    0,    2,    0,    3,    1,    1,
            1,    1,    2,    1,    1,    1,    1,    1,    3,    0,
            2,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    3,    3,    3,
            3,    3,    3,    1,    2
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
                 $this->yyval = ''; 
            },
            22 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            23 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            24 => function ($yysp) {
                 $this->yyval = []; 
            },
            25 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            26 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            27 => function ($yysp) {
                
            $this->yyval = new Model\Class_([
                'name' => $this->yyastk[$yysp - (8 - 3)],

                'flags' => $this->yyastk[$yysp - (8 - 1)],

                'extends'    => $this->yyastk[$yysp - (8 - 4)],
                'implements' => $this->yyastk[$yysp - (8 - 5)],

                'fields' => $this->yyastk[$yysp - (8 - 7)]
            ]);
        
            },
            28 => function ($yysp) {
                 $this->yyval = 0; 
            },
            29 => function ($yysp) {
                 $this->yyval = static::applyFlag($this->yyastk[$yysp - (2 - 1)], $this->yyastk[$yysp - (2 - 2)]); 
            },
            30 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL; 
            },
            31 => function ($yysp) {
                 $this->yyval = Model\Class_::FLAG_FINAL_FINAL; 
            },
            32 => function ($yysp) {
                 $this->yyval = null; 
            },
            33 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            34 => function ($yysp) {
                 $this->yyval = []; 
            },
            35 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            36 => function ($yysp) {
                 $this->yyval = []; 
            },
            37 => function ($yysp) {
                 $this->yyval = array_merge($this->yyastk[$yysp - (2 - 1)], [$this->yyastk[$yysp - (2 - 2)]]); 
            },
            38 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            39 => function ($yysp) {
                
            $this->yyval = new Model\Field([
                'name' => $this->yyastk[$yysp - (6 - 3)],

                'flags' => $this->yyastk[$yysp - (6 - 1)] | $this->yyastk[$yysp - (6 - 2)] | $this->yyastk[$yysp - (6 - 5)]['assign'],

                'type' => $this->yyastk[$yysp - (6 - 4)],

                'default' => is_null($this->yyastk[$yysp - (6 - 5)]['value'])?
                    null: static::parseDefval($this->yyastk[$yysp - (6 - 5)]['value'])
            ]);

            $this->lexer->sendGaps = false;
        
            },
            40 => function ($yysp) {
                 $this->yyval = 0; 
            },
            41 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_DIRECT; 
            },
            42 => function ($yysp) {
                 $this->yyval = 0; 
            },
            43 => function ($yysp) {
                 $this->yyval = Model\Field::FLAG_EDITABLE; 
            },
            44 => function ($yysp) {
                 $this->yyval = new Type('mixed', false); 
            },
            45 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 2)]; 
            },
            46 => function ($yysp) {
                 $this->yyval = ['assign' => 0, 'value' => null]; 
            },
            47 => function ($yysp) {
                 $this->yyval = ['assign' => $this->yyastk[$yysp - (3 - 1)], 'value'  => $this->yyastk[$yysp - (3 - 3)]]; 
            },
            48 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Model\Field::FLAG_FILTER_DEFAULT; 
            },
            49 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = 0; 
            },
            50 => function ($yysp) {
                 $this->lexer->sendGaps = true; $this->yyval = Model\Field::FLAG_DIRECT_DEFINING; 
            },
            51 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            52 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            53 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            54 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            55 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            56 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            57 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            58 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (3 - 1)].$this->yyastk[$yysp - (3 - 2)].$this->yyastk[$yysp - (3 - 3)]; 
            },
            59 => function ($yysp) {
                 $this->yyval = ''; 
            },
            60 => function ($yysp) {
                 $this->yyval = $this->yyastk[$yysp - (2 - 1)].$this->yyastk[$yysp - (2 - 2)]; 
            },
            61 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            62 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            63 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            64 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            65 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            66 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            67 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            68 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            69 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            70 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            71 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            72 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            73 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            81 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            82 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            83 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            84 => function ($yysp) {
                 $this->yyval = "**"; 
            },
            85 => function ($yysp) {
                 $this->yyval = "++"; 
            },
            86 => function ($yysp) {
                 $this->yyval = "--"; 
            },
            87 => function ($yysp) {
                 $this->yyval = "<<"; 
            },
            88 => function ($yysp) {
                 $this->yyval = ">>"; 
            },
            89 => function ($yysp) {
                 $this->yyval = "<="; 
            },
            90 => function ($yysp) {
                 $this->yyval = ">="; 
            },
            91 => function ($yysp) {
                 $this->yyval = "=="; 
            },
            92 => function ($yysp) {
                 $this->yyval = "!="; 
            },
            93 => function ($yysp) {
                 $this->yyval = "<>"; 
            },
            94 => function ($yysp) {
                 $this->yyval = "&&"; 
            },
            95 => function ($yysp) {
                 $this->yyval = "||"; 
            },
            96 => function ($yysp) {
                 $this->yyval = "??"; 
            },
            97 => function ($yysp) {
                 $this->yyval = "?:"; 
            },
            98 => function ($yysp) {
                 $this->yyval = "+="; 
            },
            99 => function ($yysp) {
                 $this->yyval = "-="; 
            },
            100 => function ($yysp) {
                 $this->yyval = "*="; 
            },
            101 => function ($yysp) {
                 $this->yyval = "/="; 
            },
            102 => function ($yysp) {
                 $this->yyval = ".="; 
            },
            103 => function ($yysp) {
                 $this->yyval = "%="; 
            },
            104 => function ($yysp) {
                 $this->yyval = "&="; 
            },
            105 => function ($yysp) {
                 $this->yyval = "|="; 
            },
            106 => function ($yysp) {
                 $this->yyval = "^="; 
            },
            107 => function ($yysp) {
                 $this->yyval = "==="; 
            },
            108 => function ($yysp) {
                 $this->yyval = "!=="; 
            },
            109 => function ($yysp) {
                 $this->yyval = "<=>"; 
            },
            110 => function ($yysp) {
                 $this->yyval = "**="; 
            },
            111 => function ($yysp) {
                 $this->yyval = "<<="; 
            },
            112 => function ($yysp) {
                 $this->yyval = ">>="; 
            },
            113 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            114 => function ($yysp) {
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
