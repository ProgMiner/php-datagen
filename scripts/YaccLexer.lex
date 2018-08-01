<?php

// vim:noexpandtab

%%

%{
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

W	= [a-zA-Z_]
N	= [0-9]
S	= [ \b\n\t\f\r]

L = {W}({W}|{N})*

%%

<REDUCE_CB> \'(\\.|[^\\\'])*\'|\"(\\.|[^\\\"])*\"|.|{L}|{S}	{
	return $this->handleReduceCB();
}

{S}+	{ return $this->createToken('GAP'); }
"//".*	{ return $this->createToken('T_COMMENT'); }

<YYINITIAL> ^"%%"$					{ return $this->createToken('T_SPLITTER'); }
<YYINITIAL> ^("%{"[^%]*"%}"|"%".*)	{ return $this->createToken('T_STMT'); }

<YYINITIAL> "{"	{ return $this->handleReduceCB(); }

<YYINITIAL>	{L}	{ return $this->createToken('T_LITERAL'); }
<YYINITIAL>	.	{ return $this->createToken(); }
