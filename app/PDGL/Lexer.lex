<?php

// vim:noexpandtab

namespace PHPDataGen\PDGL;

%%

%class Lexer
%function nextToken

%line
%char

W	= [a-zA-Z_]
N	= [0-9]
S	= [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

{S}+	{ return $this->createToken('GAP'); }
"//".*	{ return $this->createToken('T_COMMENT'); }

<YYINITIAL>	"final!"		{ return $this->createToken('T_FINAL_FINAL'); }
<YYINITIAL>	"final"			{ return $this->createToken('T_FINAL'); }
<YYINITIAL>	"class"			{ return $this->createToken('T_CLASS'); }
<YYINITIAL>	"extends"		{ return $this->createToken('T_EXTENDS'); }
<YYINITIAL>	"implements"	{ return $this->createToken('T_IMPLEMENTS'); }
<YYINITIAL>	"direct"		{ return $this->createToken('T_DIRECT'); }
<YYINITIAL>	"val"			{ return $this->createToken('T_VAL'); }
<YYINITIAL>	"var"			{ return $this->createToken('T_VAR'); }

<YYINITIAL>	"```"	{ return $this->createToken('T_TRIPLE_BACKQUOTE'); }

<YYINITIAL> \"(\\.|[^\\\"])*\" 	{ return $this->createToken('T_STRING'); }

<YYINITIAL>	":="	{ return $this->createToken('T_ASSIGN_NOT_FILTER'); }
<YYINITIAL>	"<="	{ return $this->createToken('T_ASSIGN_DIRECT'); }

<YYINITIAL>	{L}	{ return $this->createToken('T_LITERAL'); }
<YYINITIAL>	.	{ return $this->createToken(); }
