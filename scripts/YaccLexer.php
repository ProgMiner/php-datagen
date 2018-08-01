<?php
// vim:noexpandtab

class YaccLexer extends \JLexPHP\AbstractLexer  {
	const YY_BUFFER_SIZE = 512;
	const YY_F = -1;
	const YY_NO_STATE = -1;
	const YY_NOT_ACCEPT = 0;
	const YY_START = 1;
	const YY_END = 2;
	const YY_NO_ANCHOR = 4;
	const YY_BOL = 128;
	const YY_EOF = 129;

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
	protected $yy_count_chars = true;
	protected $yy_count_lines = true;

	public function __construct($stream) {
		parent::__construct($stream);
		$this->yy_lexical_state = self::YYINITIAL;
	}

	const PROGRAMS = 2;
	const YYINITIAL = 0;
	const REDUCE_CB = 1;
	protected static $yy_state_dtrans = [
		0,
		35,
		39
	];
	static $yy_acpt = [
		/* 0 */ self::YY_NOT_ACCEPT,
		/* 1 */ self::YY_NO_ANCHOR,
		/* 2 */ self::YY_NO_ANCHOR,
		/* 3 */ self::YY_NO_ANCHOR,
		/* 4 */ self::YY_NO_ANCHOR,
		/* 5 */ self::YY_NO_ANCHOR,
		/* 6 */ self::YY_NO_ANCHOR,
		/* 7 */ self::YY_START,
		/* 8 */ self::YY_NO_ANCHOR,
		/* 9 */ 3 /* self::YY_START | self::YY_END */,
		/* 10 */ self::YY_NO_ANCHOR,
		/* 11 */ self::YY_NO_ANCHOR,
		/* 12 */ self::YY_NOT_ACCEPT,
		/* 13 */ self::YY_NO_ANCHOR,
		/* 14 */ self::YY_NO_ANCHOR,
		/* 15 */ self::YY_NO_ANCHOR,
		/* 16 */ self::YY_START,
		/* 17 */ 3 /* self::YY_START | self::YY_END */,
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NOT_ACCEPT,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_START,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NO_ANCHOR,
		/* 25 */ self::YY_NOT_ACCEPT,
		/* 26 */ self::YY_START,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NOT_ACCEPT,
		/* 29 */ self::YY_START,
		/* 30 */ self::YY_NO_ANCHOR,
		/* 31 */ self::YY_NOT_ACCEPT,
		/* 32 */ self::YY_START,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NOT_ACCEPT,
		/* 35 */ self::YY_NOT_ACCEPT,
		/* 36 */ self::YY_NOT_ACCEPT,
		/* 37 */ self::YY_NOT_ACCEPT,
		/* 38 */ self::YY_NOT_ACCEPT,
		/* 39 */ self::YY_NOT_ACCEPT,
		/* 40 */ self::YY_START,
		/* 41 */ self::YY_NOT_ACCEPT
	];
		static $yy_cmap = [
 3, 3, 3, 3, 3, 3, 3, 3, 8, 8, 14, 3, 8, 4, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 8, 3, 5, 3, 3, 12, 3, 1,
 3, 3, 10, 3, 3, 3, 3, 9, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 3, 3,
 3, 3, 3, 3, 3, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
 6, 6, 6, 11, 6, 6, 6, 6, 6, 6, 6, 3, 2, 3, 3, 6, 3, 6, 6, 6,
 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 11, 6, 6, 6, 6,
 6, 6, 6, 15, 3, 16, 3, 3, 13, 0,];

		static $yy_rmap = [
 0, 1, 2, 3, 4, 1, 5, 6, 1, 1, 7, 1, 8, 9, 1, 1, 10, 11, 1, 3,
 12, 13, 14, 3, 13, 15, 16, 17, 18, 19, 20, 21, 1, 13, 22, 23, 24, 7, 17, 25,
 19, 26,];

		static $yy_nxt = [
[
 1, 2, 14, 14, 3, 14, 4, 14, 3, 21, 14, 4, 14, 13, 3, 5, 14,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, 12, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, -1, 20, 20, 20,
],
[
 -1, -1, -1, -1, 3, -1, -1, -1, 3, -1, -1, -1, -1, -1, 3, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 4, 4, -1, -1, -1, 4, -1, -1, -1, -1, -1,
],
[
 -1, 6, 6, 6, -1, 6, 6, 6, 6, 6, 6, 6, 6, -1, -1, 6, 6,
],
[
 -1, 40, 40, 40, -1, 40, 40, 40, 40, 40, 40, 40, 16, -1, -1, 22, 40,
],
[
 -1, 18, 36, 37, 37, 37, 37, 37, 37, 37, 37, 37, 37, -1, 37, 37, 37,
],
[
 -1, 20, 20, 20, -1, 20, 20, 20, 20, 20, 20, 20, 20, -1, -1, 20, 20,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 7, -1, -1, -1, -1,
],
[
 9, 40, 40, 40, 17, 40, 40, 40, 40, 40, 40, 40, 40, -1, 9, 40, 40,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 9, -1, -1,
],
[
 -1, 8, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 6, 25, -1, -1, -1, -1, -1, -1,
],
[
 -1, 22, 22, 22, 31, 22, 22, 22, 22, 22, 22, 22, 26, -1, 31, 22, 22,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 28, 25, -1, -1, -1, -1, -1,
],
[
 -1, 40, 40, 40, -1, 40, 40, 40, 40, 40, 40, 40, 40, -1, -1, 40, 29,
],
[
 -1, 38, 41, 38, 38, 18, 38, 38, 38, 38, 38, 38, 38, -1, 38, 38, 38,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 15, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 40, 40, 40, -1, 40, 40, 40, 40, 40, 40, 40, 40, -1, -1, 40, 40,
],
[
 -1, -1, -1, -1, -1, -1, 30, 30, -1, -1, -1, 30, -1, -1, -1, -1, -1,
],
[
 -1, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 31, 34, -1, 31, 31, 31,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 32,
],
[
 1, 10, 18, 18, 23, 27, 30, 18, 23, 33, 18, 30, 18, 1, 23, 18, 18,
],
[
 -1, 37, 37, 37, -1, 37, 37, 37, 37, 37, 37, 37, 37, -1, -1, 37, 37,
],
[
 1, 11, 11, 11, 3, 11, 11, 11, 19, 24, 11, 11, 11, 1, 3, 11, 11,
],
[
 -1, 38, 38, 38, -1, 38, 38, 38, 38, 38, 38, 38, 38, -1, -1, 38, 38,
],
];

	public function /*Yytoken*/ yylex () {
		$yy_anchor = self::YY_NO_ANCHOR;
		$yy_state = self::$yy_state_dtrans[$this->yy_lexical_state];
		$yy_next_state = self::YY_NO_STATE;
		$yy_last_accept_state = self::YY_NO_STATE;
		$yy_initial = true;

		$this->yy_mark_start();

		$yy_this_accept = self::$yy_acpt[$yy_state];
		if (self::YY_NOT_ACCEPT !== $yy_this_accept) {
			$yy_last_accept_state = $yy_state;
			$this->yy_mark_end();
		}

		while (true) {
			$yy_lookahead = self::YY_BOL;

			if (!$yy_initial || !$this->yy_at_bol) {
				$yy_lookahead = $this->yy_advance();
			}

			$yy_next_state = self::$yy_nxt[self::$yy_rmap[$yy_state]][self::$yy_cmap[$yy_lookahead]];

			if (self::YY_EOF === $yy_lookahead && $yy_initial) {
				return null;
			}

			if (self::YY_F !== $yy_next_state) {
				$yy_state = $yy_next_state;
				$yy_initial = false;

				$yy_this_accept = self::$yy_acpt[$yy_state];
				if (self::YY_NOT_ACCEPT !== $yy_this_accept) {
					$yy_last_accept_state = $yy_state;
					$this->yy_mark_end();
				}
			} else {
				if (self::YY_NO_STATE === $yy_last_accept_state) {
					throw new \Exception("Lexical Error: Unmatched Input.");
				} else {
					$yy_anchor = self::$yy_acpt[$yy_last_accept_state];

					if (0 !== (self::YY_END & $yy_anchor)) {
						$this->yy_move_end();
					}

					$this->yy_to_mark();

					switch ($yy_last_accept_state) {
					case 1: 
					case -2:
						break;

					case 2: { return $this->createToken(ord($this->yytext())); }
					case -3:
						break;

					case 3: {}
					case -4:
						break;

					case 4: { return $this->createToken(YaccParser::T_LITERAL); }
					case -5:
						break;

					case 5: { return $this->handleReduceCB(); }
					case -6:
						break;

					case 6: {}
					case -7:
						break;

					case 7: { return $this->createToken(YaccParser::T_STMT); }
					case -8:
						break;

					case 8: { return $this->createToken(YaccParser::T_CHAR_TOKEN); }
					case -9:
						break;

					case 9: {
	++$this->splitter;
	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}
	return $this->createToken(YaccParser::T_SPLITTER);
}
					case -10:
						break;

					case 10: {
	return $this->handleReduceCB();
}
					case -11:
						break;

					case 11: { return $this->createToken(YaccParser::T_PROGRAM_PART); }
					case -12:
						break;

					case 13: 
					case -13:
						break;

					case 14: { return $this->createToken(ord($this->yytext())); }
					case -14:
						break;

					case 15: {}
					case -15:
						break;

					case 16: { return $this->createToken(YaccParser::T_STMT); }
					case -16:
						break;

					case 17: {
	++$this->splitter;
	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}
	return $this->createToken(YaccParser::T_SPLITTER);
}
					case -17:
						break;

					case 18: {
	return $this->handleReduceCB();
}
					case -18:
						break;

					case 19: { return $this->createToken(YaccParser::T_PROGRAM_PART); }
					case -19:
						break;

					case 21: { return $this->createToken(ord($this->yytext())); }
					case -20:
						break;

					case 22: { return $this->createToken(YaccParser::T_STMT); }
					case -21:
						break;

					case 23: {
	return $this->handleReduceCB();
}
					case -22:
						break;

					case 24: { return $this->createToken(YaccParser::T_PROGRAM_PART); }
					case -23:
						break;

					case 26: { return $this->createToken(YaccParser::T_STMT); }
					case -24:
						break;

					case 27: {
	return $this->handleReduceCB();
}
					case -25:
						break;

					case 29: { return $this->createToken(YaccParser::T_STMT); }
					case -26:
						break;

					case 30: {
	return $this->handleReduceCB();
}
					case -27:
						break;

					case 32: { return $this->createToken(YaccParser::T_STMT); }
					case -28:
						break;

					case 33: {
	return $this->handleReduceCB();
}
					case -29:
						break;

					case 40: { return $this->createToken(YaccParser::T_STMT); }
					case -30:
						break;

						default:
							$this->yy_error('INTERNAL', false);

						case -1:

					}

					$yy_initial = true;
					$yy_state = self::$yy_state_dtrans[$this->yy_lexical_state];
					$yy_next_state = self::YY_NO_STATE;
					$yy_last_accept_state = self::YY_NO_STATE;

					$this->yy_mark_start();

					$yy_this_accept = self::$yy_acpt[$yy_state];
					if (self::YY_NOT_ACCEPT !== $yy_this_accept) {
						$yy_last_accept_state = $yy_state;
						$this->yy_mark_end();
					}
				}
			}
		}
	}
}
