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

	const YYINITIAL = 0;
	const REDUCE_CB = 1;
	static $yy_state_dtrans = [
		0,
		19
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
		/* 10 */ self::YY_NOT_ACCEPT,
		/* 11 */ self::YY_NO_ANCHOR,
		/* 12 */ self::YY_NO_ANCHOR,
		/* 13 */ self::YY_START,
		/* 14 */ 3 /* self::YY_START | self::YY_END */,
		/* 15 */ self::YY_NO_ANCHOR,
		/* 16 */ self::YY_NOT_ACCEPT,
		/* 17 */ self::YY_START,
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NOT_ACCEPT,
		/* 20 */ self::YY_START,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NOT_ACCEPT,
		/* 23 */ self::YY_START,
		/* 24 */ self::YY_NO_ANCHOR,
		/* 25 */ self::YY_NOT_ACCEPT,
		/* 26 */ self::YY_START,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NOT_ACCEPT,
		/* 29 */ self::YY_START,
		/* 30 */ self::YY_NOT_ACCEPT
	];
		static $yy_cmap = [
 3, 3, 3, 3, 3, 3, 3, 3, 8, 8, 12, 3, 8, 4, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 8, 3, 5, 3, 3, 10, 3, 1,
 3, 3, 3, 3, 3, 3, 3, 9, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 3, 3,
 3, 3, 3, 3, 3, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 3, 2, 3, 3, 6, 3, 6, 6, 6,
 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
 6, 6, 6, 13, 3, 14, 3, 3, 11, 0,];

		static $yy_rmap = [
 0, 1, 1, 2, 3, 1, 4, 5, 1, 6, 7, 8, 9, 10, 11, 1, 12, 13, 2, 14,
 15, 16, 17, 18, 19, 6, 1, 9, 16, 18, 20,];

		static $yy_nxt = [
[
 1, 2, 2, 2, 3, 2, 4, 2, 3, 12, 2, 11, 3, 5, 2,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, 3, -1, -1, -1, 3, -1, -1, -1, 3, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 4, 4, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 6, 6, 6, -1, 6, 6, 6, 6, 6, 6, -1, -1, 6, 6,
],
[
 -1, 29, 29, 29, -1, 29, 29, 29, 29, 29, 13, -1, -1, 17, 29,
],
[
 -1, 15, 22, 25, 25, 25, 25, 25, 25, 25, 25, -1, 25, 25, 25,
],
[
 -1, 10, 10, 10, 10, 10, 10, 10, 10, 10, 16, -1, 10, 10, 10,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 7, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 6, -1, -1, -1, -1, -1,
],
[
 8, 29, 29, 29, 14, 29, 29, 29, 29, 29, 29, -1, 8, 29, 29,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 8, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 26,
],
[
 -1, 17, 17, 17, 10, 17, 17, 17, 17, 17, 20, -1, 10, 17, 17,
],
[
 1, 9, 15, 15, 18, 21, 24, 15, 18, 27, 15, 1, 18, 15, 15,
],
[
 -1, 29, 29, 29, -1, 29, 29, 29, 29, 29, 29, -1, -1, 29, 23,
],
[
 -1, 28, 30, 28, 28, 15, 28, 28, 28, 28, 28, -1, 28, 28, 28,
],
[
 -1, 25, 25, 25, -1, 25, 25, 25, 25, 25, 25, -1, -1, 25, 25,
],
[
 -1, 29, 29, 29, -1, 29, 29, 29, 29, 29, 29, -1, -1, 29, 29,
],
[
 -1, -1, -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 28, 28, 28, -1, 28, 28, 28, 28, 28, 28, -1, -1, 28, 28,
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

					case 8: { return $this->createToken('T_SPLITTER'); }
					case -9:
						break;

					case 9: {
	return $this->handleReduceCB();
}
					case -10:
						break;

					case 11: 
					case -11:
						break;

					case 12: { return $this->createToken(); }
					case -12:
						break;

					case 13: { return $this->createToken('T_STMT'); }
					case -13:
						break;

					case 14: { return $this->createToken('T_SPLITTER'); }
					case -14:
						break;

					case 15: {
	return $this->handleReduceCB();
}
					case -15:
						break;

					case 17: { return $this->createToken('T_STMT'); }
					case -16:
						break;

					case 18: {
	return $this->handleReduceCB();
}
					case -17:
						break;

					case 20: { return $this->createToken('T_STMT'); }
					case -18:
						break;

					case 21: {
	return $this->handleReduceCB();
}
					case -19:
						break;

					case 23: { return $this->createToken('T_STMT'); }
					case -20:
						break;

					case 24: {
	return $this->handleReduceCB();
}
					case -21:
						break;

					case 26: { return $this->createToken('T_STMT'); }
					case -22:
						break;

					case 27: {
	return $this->handleReduceCB();
}
					case -23:
						break;

					case 29: { return $this->createToken('T_STMT'); }
					case -24:
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
