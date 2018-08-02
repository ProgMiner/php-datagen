<?php

// vim:noexpandtab

namespace PHPDataGen\PDGL;

use PHPDataGen\PDGL;

%%

%class Lexer

%{
	protected $gaps = [];
	protected $lastToken = null;

	protected createToken(?int $type = null) {
		$token = parent::createToken($type);

		$this->lastToken = $token;
		return $token;
	}

	protected getGaps(bool $clean = true): array {
		$gaps = $this->gaps;

		if ($clean) {
			$this->gaps = [];
		}

		return $gaps;
	}
%}

%line
%char

W	= [a-zA-Z_]
N	= [0-9]
S	= [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

{S}+|"//".*	{ $this->gaps[] = $this->yytext(); }

<YYINITIAL>	"final"			{ return $this->createToken(PDGL::T_FINAL); }
<YYINITIAL>	"class"			{ return $this->createToken(PDGL::T_CLASS); }
<YYINITIAL>	"extends"		{ return $this->createToken(PDGL::T_EXTENDS); }
<YYINITIAL>	"implements"	{ return $this->createToken(PDGL::T_IMPLEMENTS); }
<YYINITIAL>	"direct"		{ return $this->createToken(PDGL::T_DIRECT); }
<YYINITIAL>	"val"			{ return $this->createToken(PDGL::T_VAL); }
<YYINITIAL>	"var"			{ return $this->createToken(PDGL::T_VAR); }

<YYINITIAL>	"```"	{ return $this->createToken(PDGL::T_TRIPLE_BACKQUOTE); }
<YYINITIAL>	":="	{ return $this->createToken(PDGL::T_COLON_ASSIGN); }
<YYINITIAL>	"<="	{ return $this->createToken(PDGL::T_ARROW_ASSIGN); }

<YYINITIAL> \"(\\.|[^\\\"])*\" 	{ return $this->createToken(PDGL::T_STRING); }

<YYINITIAL>	{L}	{ return $this->createToken(PDGL::T_LITERAL); }
<YYINITIAL>	.	{ return $this->createToken(); }
