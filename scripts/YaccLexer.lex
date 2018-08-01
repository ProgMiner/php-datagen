<?php

// vim:noexpandtab

%%

%{
	private $splitter = 0;

	private function handleReduceCB() {
		static $bracesDepth = 0;

		if ($bracesDepth === 0) {
			$this->yybegin(self::REDUCE_CB);
		}

		switch ($this->yytext()) {
		case '{':
			++$bracesDepth;
			break;

		case '}':
			--$bracesDepth;
			break;
		}

		if ($bracesDepth === 0) {
			$this->yybegin(self::YYINITIAL);
		}

		return $this->createToken(YaccParser::T_REDUCE_CB);
	}
%}

%class YaccLexer

%line
%char

%state REDUCE_CB
%state PROGRAMS

W = [a-zA-Z_]
N = [0-9]
S = [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

<REDUCE_CB>	\'(\\.|[^\\\'])*\'|\"(\\.|[^\\\"])*\"|.|{L}|{S}	{
	return $this->handleReduceCB();
}

<PROGRAMS>	.	{ return $this->createToken(YaccParser::T_PROGRAM_PART); }

{S}+					{}
"/*"[\s\S]*"*/"|"//".*	{}

<YYINITIAL>	^"%%"$	{
	++$this->splitter;

	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}

	return $this->createToken(YaccParser::T_SPLITTER);
}

<YYINITIAL>	^("%{"[^%]*"%}"|"%".*)	{ return $this->createToken(YaccParser::T_STMT); }

<YYINITIAL>	\'(\\.|[^\\'])\'	{ return $this->createToken(YaccParser::T_CHAR_TOKEN); }

<YYINITIAL>	"{"	{ return $this->handleReduceCB(); }

<YYINITIAL>	{L}	{ return $this->createToken(YaccParser::T_LITERAL); }
<YYINITIAL>	.	{ return $this->createToken(ord($this->yytext())); }
