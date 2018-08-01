<?php
// vim:noexpandtab

class YaccLexer extends \JLexPHP\Base  {
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
			$this->yybegin(self::REDUCE_CB);
		}
		return $this->createToken('T_REDUCE_CB');
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
	static $yy_state_dtrans = [
		0,
		29,
		35
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
		/* 8 */ 3 /* self::YY_START | self::YY_END */,
		/* 9 */ self::YY_NO_ANCHOR,
		/* 10 */ self::YY_NO_ANCHOR,
		/* 11 */ self::YY_NOT_ACCEPT,
		/* 12 */ self::YY_NO_ANCHOR,
		/* 13 */ self::YY_NO_ANCHOR,
		/* 14 */ self::YY_NO_ANCHOR,
		/* 15 */ self::YY_START,
		/* 16 */ 3 /* self::YY_START | self::YY_END */,
		/* 17 */ self::YY_NO_ANCHOR,
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NOT_ACCEPT,
		/* 20 */ self::YY_START,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NOT_ACCEPT,
		/* 24 */ self::YY_START,
		/* 25 */ self::YY_NO_ANCHOR,
		/* 26 */ self::YY_NOT_ACCEPT,
		/* 27 */ self::YY_START,
		/* 28 */ self::YY_NO_ANCHOR,
		/* 29 */ self::YY_NOT_ACCEPT,
		/* 30 */ self::YY_START,
		/* 31 */ self::YY_NO_ANCHOR,
		/* 32 */ self::YY_NOT_ACCEPT,
		/* 33 */ self::YY_NOT_ACCEPT,
		/* 34 */ self::YY_NOT_ACCEPT,
		/* 35 */ self::YY_NOT_ACCEPT,
		/* 36 */ self::YY_START,
		/* 37 */ self::YY_NOT_ACCEPT
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
 0, 1, 1, 2, 3, 1, 4, 5, 1, 6, 1, 7, 8, 9, 1, 10, 11, 1, 2, 12,
 13, 2, 9, 14, 15, 16, 17, 18, 19, 20, 1, 9, 21, 6, 16, 22, 18, 23,];

		static $yy_nxt = [
[
 1, 2, 2, 2, 3, 2, 4, 2, 3, 13, 2, 4, 2, 12, 3, 5, 2,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
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
 -1, 36, 36, 36, -1, 36, 36, 36, 36, 36, 36, 36, 15, -1, -1, 20, 36,
],
[
 -1, 17, 32, 33, 33, 33, 33, 33, 33, 33, 33, 33, 33, -1, 33, 33, 33,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 19, 11, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 7, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 6, 11, -1, -1, -1, -1, -1, -1,
],
[
 8, 36, 36, 36, 16, 36, 36, 36, 36, 36, 36, 36, 36, -1, 8, 36, 36,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 8, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 14, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 20, 20, 20, 23, 20, 20, 20, 20, 20, 20, 20, 24, -1, 23, 20, 20,
],
[
 -1, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 26, -1, 23, 23, 23,
],
[
 -1, 36, 36, 36, -1, 36, 36, 36, 36, 36, 36, 36, 36, -1, -1, 36, 27,
],
[
 -1, 34, 37, 34, 34, 17, 34, 34, 34, 34, 34, 34, 34, -1, 34, 34, 34,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 30,
],
[
 -1, 36, 36, 36, -1, 36, 36, 36, 36, 36, 36, 36, 36, -1, -1, 36, 36,
],
[
 -1, -1, -1, -1, -1, -1, 28, 28, -1, -1, -1, 28, -1, -1, -1, -1, -1,
],
[
 1, 9, 17, 17, 21, 25, 28, 17, 21, 31, 17, 28, 17, 1, 21, 17, 17,
],
[
 -1, 33, 33, 33, -1, 33, 33, 33, 33, 33, 33, 33, 33, -1, -1, 33, 33,
],
[
 1, 10, 10, 10, 3, 10, 10, 10, 18, 22, 10, 10, 10, 1, 3, 10, 10,
],
[
 -1, 34, 34, 34, -1, 34, 34, 34, 34, 34, 34, 34, 34, -1, -1, 34, 34,
],
];

	public function /*Yytoken*/ nextToken () {
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

					case 2: { return $this->createToken(); }
					case -3:
						break;

					case 3: { return $this->createToken('GAP'); }
					case -4:
						break;

					case 4: { return $this->createToken('T_LITERAL'); }
					case -5:
						break;

					case 5: { return $this->handleReduceCB(); }
					case -6:
						break;

					case 6: { return $this->createToken('T_COMMENT'); }
					case -7:
						break;

					case 7: { return $this->createToken('T_STMT'); }
					case -8:
						break;

					case 8: {
	++$this->splitter;
	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}
	return $this->createToken('T_SPLITTER');
}
					case -9:
						break;

					case 9: {
	return $this->handleReduceCB();
}
					case -10:
						break;

					case 10: { return $this->createToken('T_PROGRAM_PART'); }
					case -11:
						break;

					case 12: 
					case -12:
						break;

					case 13: { return $this->createToken(); }
					case -13:
						break;

					case 14: { return $this->createToken('T_COMMENT'); }
					case -14:
						break;

					case 15: { return $this->createToken('T_STMT'); }
					case -15:
						break;

					case 16: {
	++$this->splitter;
	if ($this->splitter === 2) {
		$this->yybegin(self::PROGRAMS);
	}
	return $this->createToken('T_SPLITTER');
}
					case -16:
						break;

					case 17: {
	return $this->handleReduceCB();
}
					case -17:
						break;

					case 18: { return $this->createToken('T_PROGRAM_PART'); }
					case -18:
						break;

					case 20: { return $this->createToken('T_STMT'); }
					case -19:
						break;

					case 21: {
	return $this->handleReduceCB();
}
					case -20:
						break;

					case 22: { return $this->createToken('T_PROGRAM_PART'); }
					case -21:
						break;

					case 24: { return $this->createToken('T_STMT'); }
					case -22:
						break;

					case 25: {
	return $this->handleReduceCB();
}
					case -23:
						break;

					case 27: { return $this->createToken('T_STMT'); }
					case -24:
						break;

					case 28: {
	return $this->handleReduceCB();
}
					case -25:
						break;

					case 30: { return $this->createToken('T_STMT'); }
					case -26:
						break;

					case 31: {
	return $this->handleReduceCB();
}
					case -27:
						break;

					case 36: { return $this->createToken('T_STMT'); }
					case -28:
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
