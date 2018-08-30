<?php

namespace PHPDataGen\PDGL;

use JLexPHP\Token;

use PHPDataGen\PDGL;

%%

%class Lexer

%{
    public $sendGaps = false;

    protected $gaps = [];
    protected $lastToken = null;

    public function createToken(?int $type = null): Token {
        $token = parent::createToken($type);

        $this->lastToken = $token;
        return $token;
    }

    public function getGaps(bool $clean = true): array {
        $gaps = $this->gaps;

        if ($clean) {
            $this->gaps = [];
        }

        return $gaps;
    }

    protected function handleStringDQ(bool $init = false) {
        static $depth = 0;
        static $quotes = [];
        static $buf = '';

        if ($init) {
            $this->yybegin(self::STRING_DQ);

            $depth = 0;
            $quotes = [];
            $buf = '';
        }

        if ($depth === count($quotes)) {
            if (in_array($this->yytext(), ["'", '"'])) {
                $quotes[] = $this->yytext();
            } else if ($this->yytext() === '}') {
                --$depth;
            }
        } else if ($depth < count($quotes)) {
            if ($buf === '\\') {
                $buf = '';
            } else if ($buf === '$') {
                if ($this->yytext() === '{') {
                    ++$depth;
                }

                $buf = '';
            } else {
                if ($this->yytext() === '\\') {
                    $buf = '\\';
                } else if ($quotes[count($quotes) - 1] === '"' && $this->yytext() === '$') {
                    $buf = '$';
                } else if ($this->yytext() === $quotes[count($quotes) - 1]) {
                    array_pop($quotes);
                }
            }
        }

        if ($depth === 0 && empty($quotes)) {
            $this->yybegin(self::YYINITIAL);
        }

        return $this->createToken(PDGL::T_STRING_DQ);
    }
%}

%line
%char

%state STRING_DQ

W   = [a-zA-Z_]
N   = [0-9]
S   = [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

<STRING_DQ> .   { return $this->handleStringDQ(); }
<YYINITIAL> \"  { return $this->handleStringDQ(true); }

({S}|"//".*)+   {
    $token = $this->createToken(PDGL::T_GAP);
    $this->gaps[] = $token;

    if ($this->sendGaps) {
        return $token;
    }
}

<YYINITIAL> "final"         { return $this->createToken(PDGL::T_FINAL); }
<YYINITIAL> "class"         { return $this->createToken(PDGL::T_CLASS); }
<YYINITIAL> "extends"       { return $this->createToken(PDGL::T_EXTENDS); }
<YYINITIAL> "implements"    { return $this->createToken(PDGL::T_IMPLEMENTS); }
<YYINITIAL> "direct"        { return $this->createToken(PDGL::T_DIRECT); }
<YYINITIAL> "val"           { return $this->createToken(PDGL::T_VAL); }
<YYINITIAL> "var"           { return $this->createToken(PDGL::T_VAR); }
<YYINITIAL> "const"         { return $this->createToken(PDGL::T_CONST); }
<YYINITIAL> "public"        { return $this->createToken(PDGL::T_PUBLIC); }
<YYINITIAL> "protected"     { return $this->createToken(PDGL::T_PROTECTED); }
<YYINITIAL> "private"       { return $this->createToken(PDGL::T_PRIVATE); }
<YYINITIAL> "enum"          { return $this->createToken(PDGL::T_ENUM); }

<YYINITIAL> "-"?{N}+                { return $this->createToken(PDGL::T_NUMBER); }
<YYINITIAL> "'"(\\.|[^\\\'])*"'"    { return $this->createToken(PDGL::T_STRING_SQ); }

<YYINITIAL> "```"   { return $this->createToken(PDGL::T_TRIPLE_BACKQUOTE); }
<YYINITIAL> ":="    { return $this->createToken(PDGL::T_COLON_ASSIGN); }
<YYINITIAL> "<="    { return $this->createToken(PDGL::T_ARROW_ASSIGN); }

<YYINITIAL> {L} { return $this->createToken(PDGL::T_LITERAL); }
<YYINITIAL> .   { return $this->createToken(); }
