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

    const YYBADCH = 140;
    const YYMAXLEX = 268;
    const YYTERMS = 140;
    const YYNONTERMS = 26;

    const YYLAST = 417;

    const YY2TBLSTATE = 68;

    const YYGLAST = 45;

    const YYSTATES = 285;
    const YYNLSTATES = 94;
    const YYINTERRTOK = 1;
    const YYUNEXPECTED = 32767;
    const YYDEFAULT = -32766;

    const YYERRTOK = 256;
    const T_FINAL = 257;
    const T_CLASS = 258;
    const T_EXTENDS = 259;
    const T_IMPLEMENTS = 260;
    const T_DIRECT = 261;
    const T_VAL = 262;
    const T_VAR = 263;
    const T_TRIPLE_BACKQUOTE = 264;
    const T_COLON_ASSIGN = 265;
    const T_ARROW_ASSIGN = 266;
    const T_LITERAL = 267;

    protected $yytranslate = [
           84,   77,   78,   79,   80,   81,   82,   83,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,   15,   52,   85,   23,   32,   26,   51,
           24,   25,   29,   27,   17,   28,   31,   30,   41,   42,
           43,   44,   45,   46,   47,   48,   49,   50,   19,   18,
           35,   21,   36,  139,   38,   86,   87,   88,   89,   90,
           91,   92,   93,   94,   95,   96,   97,   98,   99,  100,
          101,  102,  103,  104,  105,  106,  107,  108,  109,  110,
          111,   39,   16,   40,   34,  112,   22,  113,  114,  115,
          116,  117,  118,  119,  120,  121,  122,  123,  124,  125,
          126,  127,  128,  129,  130,  131,  132,  133,  134,  135,
          136,  137,  138,   13,   33,   14,   37,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,  140,  140,  140,  140,
          140,  140,  140,  140,  140,  140,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12
    ];

    protected $yyaction = [
          196,  197,  198,  199,  200,  201,  202,  203,  204,  205,
          206,  329,  331,  239,  298,  250,  265,  264,  269,  267,
          302,  242,  246,  247,  244,  249,  251,  248,  253,  252,
          243,  330,  300,  266,  268,  332,  270,  297,  299,  254,
          255,  256,  257,  258,  259,  260,  261,  262,  263,  245,
          240,  207,  208,  209,  210,  211,  212,  213,  214,  215,
          216,  217,  218,  219,  220,  221,  222,  223,  224,  225,
          226,  227,  228,  229,  230,  231,  232,  233,  234,  235,
          236,  237,  238,  241,  271,  272,  273,  274,  275,  276,
          277,  278,  279,  280,  281,  282,  283,  284,  285,  286,
          287,  288,  289,  290,  291,  292,  293,  294,  295,  296,
          301,  303,  304,  305,  306,  307,  308,  309,  310,  311,
          312,  313,  314,  315,  316,  317,  318,  319,  320,  321,
          322,  323,  324,  325,  326,  327,  328,  333,  -99,  122,
          123,  -99,  -99,  -99,  -99,  -99,   -1,  -99,  -99,    0,
          -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,
          -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,
          -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,  -99,
          -99,  -99,  110,   28,   74,   29,   79,  174,  131,  132,
           93,   30,   39,   87,   32,   77,   33,   34,   35,  130,
           64,  110,  154,   62,  153,   79,  121,   36,   37,   38,
           70,  182,  183,  184,  185,  186,  187,  188,  189,  190,
          191,    2,    1,  135,   27,   60,  100,   83,   73,   43,
          111,  112,  137,   90,   42,   44,   63,   31,  103,   65,
           45,   46,   47,   91,  147,  148,  149,   92,  152,   68,
           69,   43,  119,  -40,   48,   90,  176,   44,  127,   40,
           49,   54,   45,   46,   47,   91,  147,  148,  149,   92,
          152,   68,   69,  179,   43,   55,  177,   50,   90,   51,
           44,   41,  160,   52,  170,   45,   46,   47,   91,  147,
          148,  149,   92,  152,   68,   69,  335,   43,  155,  194,
            0,   90,    0,   44,    0,    0,    0,    6,   45,   46,
           47,   91,  147,  148,  149,   92,  152,   68,   69,   43,
            0,    0,    0,   90,    0,   44,   26,    0,    0,    0,
           45,   46,   47,   91,  147,  148,  149,   92,  152,   68,
           69,   43,    0,    0,    0,   90,    0,   44,    0,    0,
            0,  140,   45,   46,   47,   91,  147,  148,  149,   92,
          152,   68,   69,   43,    0,    0,    0,   90,    0,   44,
           53,    0,    0,    0,   45,   46,   47,   91,  147,  148,
          149,   92,  152,   68,   69,   43,    0,    0,    0,   90,
            0,   44,    0,    0,    0,    0,   45,   46,   47,   91,
          147,  148,  149,   92,  152,   68,   69,  182,  183,  184,
          185,  186,  187,  188,  189,  190,  191
    ];

    protected $yycheck = [
            2,    3,    4,    5,    6,    7,    8,    9,   10,   11,
           12,   13,   14,   15,   16,   17,   18,   19,   20,   21,
           22,   23,   24,   25,   26,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
           42,   43,   44,   45,   46,   47,   48,   49,   50,   51,
           52,   53,   54,   55,   56,   57,   58,   59,   60,   61,
           62,   63,   64,   65,   66,   67,   68,   69,   70,   71,
           72,   73,   74,   75,   76,   77,   78,   79,   80,   81,
           82,   83,   84,   85,   86,   87,   88,   89,   90,   91,
           92,   93,   94,   95,   96,   97,   98,   99,  100,  101,
          102,  103,  104,  105,  106,  107,  108,  109,  110,  111,
          112,  113,  114,  115,  116,  117,  118,  119,  120,  121,
          122,  123,  124,  125,  126,  127,  128,  129,  130,  131,
          132,  133,  134,  135,  136,  137,  138,  139,    9,    7,
            8,   12,   13,   14,   15,   16,    0,   18,   19,    0,
           21,   22,   23,   24,   25,   26,   27,   28,   29,   30,
           31,   32,   33,   34,   35,   36,   37,   38,   39,   40,
           41,   42,   43,   44,   45,   46,   47,   48,   49,   50,
           51,   52,   12,   13,    2,   15,   16,   21,   10,   11,
           21,   21,   22,   23,   24,    3,   26,   27,   28,   21,
            4,   12,   36,    5,   35,   16,    6,   37,   38,   39,
           13,   41,   42,   43,   44,   45,   46,   47,   48,   49,
           50,   51,   52,    9,    9,   12,   14,   16,   12,   15,
           12,   12,   12,   19,   13,   21,   19,   22,   15,   17,
           26,   27,   28,   29,   30,   31,   32,   33,   34,   35,
           36,   15,   18,   18,   21,   19,   19,   21,   20,   27,
           21,   21,   26,   27,   28,   29,   30,   31,   32,   33,
           34,   35,   36,   14,   15,   21,   40,   26,   19,   27,
           21,   28,   33,   28,   36,   26,   27,   28,   29,   30,
           31,   32,   33,   34,   35,   36,   14,   15,   29,   52,
           -1,   19,   -1,   21,   -1,   -1,   -1,   51,   26,   27,
           28,   29,   30,   31,   32,   33,   34,   35,   36,   15,
           -1,   -1,   -1,   19,   -1,   21,   22,   -1,   -1,   -1,
           26,   27,   28,   29,   30,   31,   32,   33,   34,   35,
           36,   15,   -1,   -1,   -1,   19,   -1,   21,   -1,   -1,
           -1,   25,   26,   27,   28,   29,   30,   31,   32,   33,
           34,   35,   36,   15,   -1,   -1,   -1,   19,   -1,   21,
           22,   -1,   -1,   -1,   26,   27,   28,   29,   30,   31,
           32,   33,   34,   35,   36,   15,   -1,   -1,   -1,   19,
           -1,   21,   -1,   -1,   -1,   -1,   26,   27,   28,   29,
           30,   31,   32,   33,   34,   35,   36,   41,   42,   43,
           44,   45,   46,   47,   48,   49,   50
    ];

    protected $yybase = [
          182,  221,   -2,  256,   -2,   -2,  129,  214,  259,  326,
          236,  282,  370,  370,  370,  304,  370,  370,  370,  370,
          370,  370,  348,  370,  370,  215,  235,  170,  170,  170,
          170,  170,  170,  170,  232,  253,  170,  170,  170,  170,
          232,  253,  170,  233,  239,  251,  252,  255,  240,  254,
          170,  232,  253,  170,  170,  170,  366,  366,  178,  146,
          198,  212,  189,  189,  189,  189,  132,  238,  169,  166,
          200,  198,  196,  217,  223,  149,  192,  213,  197,  218,
          211,  211,  222,  219,  211,  216,  234,  220,  211,  247,
          237,  269,  249,  248,    0,   -2,    0,   -2,    0,    0,
            0,  170,  170,  170,  170,  170,  170,  170,  170,  170,
          170,  170,  170,  170,  170,  170,  170,  170,  170,  170,
          170,    0,    0,    0,    0,    0,    0,    0,  170,  170,
            0,    0,    0,    0,  170,  170,    0,  170,  170,  170,
          170,  170,  170,  170,    0,  170,  170,    0,    0,    0,
            0,    0,    0,  182,  196,  200,    0,    0,    0,    0,
            0,  211
    ];

    protected $yydefault = [
            2,32767,32767,32767,32767,32767,  151,32767,32767,32767,
        32767,32767,   39,   70,   48,32767,   49,   68,   69,   71,
           81,   44,32767,   64,   65,32767,   84,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,  235,32767,   47,   56,   50,   51,   75,   74,
           67,   62,   63,   84,   73,   72,   86,   98,   34,    7,
           12,   26,32767,32767,32767,32767,32767,   32,   77,   79,
           21,   14,   12,   30,    8,32767,32767,32767,32767,32767,
           13,   19,   15,32767,   20,32767,32767,32767,   45,32767,
        32767,   52,   57,   78
    ];

    protected $yygoto = [
           12,   22,    7,    8,   13,   14,   15,    9,   16,   17,
           18,   19,   20,   10,   22,   23,   24,   11,   13,   14,
           16,   17,   18,   14,   14,   16,   23,   24,   22,   14,
           14,   81,   67,   80,   84,    4,    3,   57,   57,   98,
          116,    0,  104,    0,  105
    ];

    protected $yygcheck = [
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   21,   21,   21,   21,   21,   21,   21,   21,   21,
           21,   10,   10,   10,   10,   24,   24,   22,   22,    3,
           12,   -1,    9,   -1,    8
    ];

    protected $yygbase = [
            0,    0,    0,  -20,    0,    0,    0,    0,  -28,  -29,
          -31,    0,  -30,    0,    0,    0,    0,    0,    0,    0,
            0,  -25,  -19,    0,   34,    0
    ];

    protected $yygdefault = [
        -32768,   75,   59,   97,   99,   76,   78,   61,   71,   72,
           88,   82,  117,  118,   66,   85,   58,   86,  125,   25,
          129,   21,   56,  181,    5,   89
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
           21,   21,   21,   21,   21,   21,   21,   21,   22,   22,
           22,   22,   22,   22,   22,   22,   22,   22,   22,   23,
           23,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   24,   24,   24,   24,   24,   24,   24,   24,   24,
           24,   25,   25
    ];

    protected $yylen = [
            1,    1,    0,    1,    2,    1,    7,    0,    1,    2,
            2,    2,    0,    2,    0,    2,    1,    2,    3,    1,
            3,    0,    1,    2,    1,    6,    0,    1,    1,    1,
            0,    2,    1,    2,    0,    2,    1,    1,    1,    1,
            3,    3,    1,    2,    2,    1,    3,    2,    2,    2,
            2,    2,    2,    2,    2,    2,    2,    2,    2,    3,
            3,    3,    3,    3,    3,    3,    3,    3,    2,    2,
            2,    2,    4,    4,    3,    3,    4,    2,    3,    2,
            3,    2,    3,    3,    3,    3,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    2,    3,
            3,    0,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            2,    3,    1
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
                 $this->yyval = new Model\File(['fields' => ($this->yyastk[$yysp - (1 - 1)] ?? '')]); 
            },
            2 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            3 => function ($yysp) {
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            4 => function ($yysp) {
                 ($this->yyastk[$yysp - (2 - 1)] ?? '')[] = ($this->yyastk[$yysp - (2 - 2)] ?? ''); $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? ''); 
            },
            5 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            6 => function ($yysp) {
                
			$this->yyval = new Model\Class_([
				'name' => ($this->yyastk[$yysp - (7 - 3)] ?? ''),

				'data'       => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 4) !== false,
				'final'      => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 1) !== false,
				'finalFinal' => (($this->yyastk[$yysp - (7 - 1)] ?? '') & 2) !== false,

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
                 $this->yyval = '\\'.($this->yyastk[$yysp - (2 - 2)] ?? ''); 
            },
            18 => function ($yysp) {
                 $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? '').'\\'.($this->yyastk[$yysp - (3 - 3)] ?? ''); 
            },
            19 => function ($yysp) {
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            20 => function ($yysp) {
                 ($this->yyastk[$yysp - (3 - 1)] ?? '')[] = ($this->yyastk[$yysp - (3 - 3)] ?? ''); $this->yyval = ($this->yyastk[$yysp - (3 - 1)] ?? ''); 
            },
            21 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            22 => function ($yysp) {
                 $this->yyval = [($this->yyastk[$yysp - (1 - 1)] ?? '')]; 
            },
            23 => function ($yysp) {
                 ($this->yyastk[$yysp - (2 - 1)] ?? '')[] = ($this->yyastk[$yysp - (2 - 2)] ?? ''); $this->yyval = ($this->yyastk[$yysp - (2 - 1)] ?? ''); 
            },
            24 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            25 => function ($yysp) {
                
			$this->yyval = new Model\Field([
				'name' => ($this->yyastk[$yysp - (6 - 3)] ?? ''),

				'editable' => ($this->yyastk[$yysp - (6 - 2)] ?? ''),
				'direct'   => (($this->yyastk[$yysp - (6 - 1)] ?? '') & 1) !== false,

				'type' => ($this->yyastk[$yysp - (6 - 4)] ?? ''),

				'directDefining' => (($this->yyastk[$yysp - (6 - 5)] ?? '')['assign'] & 2) !== false,
				'filterDefault'  => (($this->yyastk[$yysp - (6 - 5)] ?? '')['assign'] & 1) !== false,
				'default'        => $this->parsePHP(($this->yyastk[$yysp - (6 - 5)] ?? '')['value'])
			];
		
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
                 $this->yyval = ($this->yyastk[$yysp - (1 - 1)] ?? ''); 
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            59 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            60 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            85 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            86 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            87 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            88 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            110 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
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
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            132 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            133 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            134 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            135 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            136 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            137 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            138 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            139 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            140 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            141 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            142 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            143 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            144 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            145 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            146 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            147 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            148 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            149 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            150 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            151 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            152 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            153 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            154 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            155 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            156 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            157 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            158 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            159 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            160 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            161 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            162 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            163 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            164 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            165 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            166 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            167 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            168 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            169 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            170 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            171 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            172 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            173 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            174 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            175 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            176 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            177 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            178 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            179 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            180 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            181 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            182 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            183 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            184 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            185 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            186 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            187 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            188 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            189 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            190 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            191 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            192 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            193 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            194 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            195 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            196 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            197 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            198 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            199 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            200 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            201 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            202 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            203 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            204 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            205 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            206 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            207 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            208 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            209 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            210 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            211 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            212 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            213 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            214 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            215 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            216 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            217 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            218 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            219 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            220 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            221 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            222 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            223 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            224 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            225 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            226 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            227 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            228 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            229 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            230 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            231 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            232 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            233 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            234 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            235 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            236 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            237 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            238 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            239 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            240 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            241 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
            242 => function ($yysp) {
                $this->yyval = $this->yyastk[$yysp] ?? '';
            },
        ];
    }
}

