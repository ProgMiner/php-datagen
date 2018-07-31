<?php

// vim: syntax=php
$meta #
#semval($) $this->semValue
#semval($,%t) $this->semValue
#semval(%n) $stackPos-(%l-%n)
#semval(%n,%t) $stackPos-(%l-%n)

namespace PHPDataGen\PDGL;

use PHPDataGen\Model;
use PHPDataGen\Type;

#include;

/**
 * This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends \PhpParser\ParserAbstract {

    protected $tokenToSymbolMapSize = #(YYMAXLEX);
    protected $actionTableSize      = #(YYLAST);
    protected $gotoTableSize        = #(YYGLAST);

    protected $invalidSymbol       = #(YYBADCH);
    protected $errorSymbol         = #(YYINTERRTOK);
    protected $defaultAction       = #(YYDEFAULT);
    protected $unexpectedTokenRule = #(YYUNEXPECTED);

    protected $YY2TBLSTATE = #(YY2TBLSTATE);
    protected $YYNLSTATES  = #(YYNLSTATES);

    protected $symbolToName = [
        #listvar terminals
    ];

    protected $tokenToSymbol = [
        #listvar yytranslate
    ];

    protected $action = [
        #listvar yyaction
    ];

    protected $actionCheck = [
        #listvar yycheck
    ];

    protected $actionBase = [
        #listvar yybase
    ];

    protected $actionDefault = [
        #listvar yydefault
    ];

    protected $goto = [
        #listvar yygoto
    ];

    protected $gotoCheck = [
        #listvar yygcheck
    ];

    protected $gotoBase = [
        #listvar yygbase
    ];

    protected $gotoDefault = [
        #listvar yygdefault
    ];

    protected $ruleToNonTerminal = [
        #listvar yylhs
    ];

    protected $ruleToLength = [
        #listvar yylen
    ];
#if -t

    protected $productions = [
        #production-strings;
    ];
#endif

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
#reduce
            %n => function ($stackPos) {
                %b
            },
#noact
            %n => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
#endreduce
        ];
    }
}
#tailcode;
