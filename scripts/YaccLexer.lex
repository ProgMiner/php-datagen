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
			$this->yybegin(self::REDUCE_CB);
		}

		return $this->createToken('T_REDUCE_CB');
	}
%}

%class YaccLexer
%function nextToken

%line
%char

%state REDUCE_CB
%state PROGRAMS

W	= [a-zA-Z_]
N	= [0-9]
S	= [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

<REDUCE_CB> \'(\\.|[^\\\'])*\'|\"(\\.|[^\\\"])*\"|.|{L}|{S}	{
	return $this->handleReduceCB();
}

<PROGRAMS>	.	{ return $this->createToken('T_PROGRAM_PART'); }

{S}+					{ return $this->createToken('GAP'); }
"/*"[\s\S]*"*/"|"//".*	{ return $this->createToken('T_COMMENT'); }

<YYINITIAL> ^"%%"$	{
	++$this->splitter;

	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}

	return $this->createToken('T_SPLITTER');
}

<YYINITIAL> ^("%{"[^%]*"%}"|"%".*)	{ return $this->createToken('T_STMT'); }

<YYINITIAL> "{"	{ return $this->handleReduceCB(); }

<YYINITIAL>	{L}	{ return $this->createToken('T_LITERAL'); }
<YYINITIAL>	.	{ return $this->createToken(); }
