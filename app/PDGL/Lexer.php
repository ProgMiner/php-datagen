<?php
// vim:noexpandtab
namespace PHPDataGen\PDGL;

class Lexer extends \JLexPHP\Base  {
	const YY_BUFFER_SIZE = 512;
	const YY_F = -1;
	const YY_NO_STATE = -1;
	const YY_NOT_ACCEPT = 0;
	const YY_START = 1;
	const YY_END = 2;
	const YY_NO_ANCHOR = 4;
	const YY_BOL = 128;
	const YY_EOF = 129;
	protected $yy_count_chars = true;
	protected $yy_count_lines = true;

	public function __construct($stream) {
		parent::__construct($stream);
		$this->yy_lexical_state = self::YYINITIAL;
	}

	const YYINITIAL = 0;
	static $yy_state_dtrans = [
		0
	];
	static $yy_acpt = [
		/* 0 */ self::YY_NOT_ACCEPT,
		/* 1 */ self::YY_NO_ANCHOR,
		/* 2 */ self::YY_NO_ANCHOR,
		/* 3 */ self::YY_NO_ANCHOR,
		/* 4 */ self::YY_NO_ANCHOR,
		/* 5 */ self::YY_NO_ANCHOR,
		/* 6 */ self::YY_NO_ANCHOR,
		/* 7 */ self::YY_NO_ANCHOR,
		/* 8 */ self::YY_NO_ANCHOR,
		/* 9 */ self::YY_NO_ANCHOR,
		/* 10 */ self::YY_NO_ANCHOR,
		/* 11 */ self::YY_NO_ANCHOR,
		/* 12 */ self::YY_NO_ANCHOR,
		/* 13 */ self::YY_NO_ANCHOR,
		/* 14 */ self::YY_NO_ANCHOR,
		/* 15 */ self::YY_NO_ANCHOR,
		/* 16 */ self::YY_NO_ANCHOR,
		/* 17 */ self::YY_NO_ANCHOR,
		/* 18 */ self::YY_NOT_ACCEPT,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NOT_ACCEPT,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NOT_ACCEPT,
		/* 25 */ self::YY_NO_ANCHOR,
		/* 26 */ self::YY_NO_ANCHOR,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NO_ANCHOR,
		/* 29 */ self::YY_NO_ANCHOR,
		/* 30 */ self::YY_NO_ANCHOR,
		/* 31 */ self::YY_NO_ANCHOR,
		/* 32 */ self::YY_NO_ANCHOR,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NO_ANCHOR,
		/* 35 */ self::YY_NO_ANCHOR,
		/* 36 */ self::YY_NO_ANCHOR,
		/* 37 */ self::YY_NO_ANCHOR,
		/* 38 */ self::YY_NO_ANCHOR,
		/* 39 */ self::YY_NO_ANCHOR,
		/* 40 */ self::YY_NO_ANCHOR,
		/* 41 */ self::YY_NO_ANCHOR,
		/* 42 */ self::YY_NO_ANCHOR,
		/* 43 */ self::YY_NO_ANCHOR,
		/* 44 */ self::YY_NO_ANCHOR,
		/* 45 */ self::YY_NO_ANCHOR,
		/* 46 */ self::YY_NO_ANCHOR,
		/* 47 */ self::YY_NO_ANCHOR,
		/* 48 */ self::YY_NO_ANCHOR,
		/* 49 */ self::YY_NO_ANCHOR,
		/* 50 */ self::YY_NO_ANCHOR,
		/* 51 */ self::YY_NO_ANCHOR,
		/* 52 */ self::YY_NO_ANCHOR,
		/* 53 */ self::YY_NO_ANCHOR,
		/* 54 */ self::YY_NO_ANCHOR,
		/* 55 */ self::YY_NO_ANCHOR,
		/* 56 */ self::YY_NO_ANCHOR
	];
		static $yy_cmap = [
 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 1, 3, 4, 1, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 10, 25, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 2, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 22, 3,
 24, 23, 3, 3, 3, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27,
 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 3, 26, 3, 3, 27, 21, 8, 27, 11,
 16, 13, 5, 27, 27, 6, 27, 27, 9, 17, 7, 27, 18, 27, 19, 12, 15, 27, 20, 27,
 14, 27, 27, 3, 3, 3, 3, 3, 0, 0,];

		static $yy_rmap = [
 0, 1, 2, 3, 4, 5, 1, 1, 1, 6, 6, 1, 7, 6, 1, 6, 6, 6, 8, 1,
 9, 10, 11, 12, 13, 14, 15, 16, 17, 10, 18, 19, 20, 21, 22, 23, 24, 25, 26, 6,
 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 6, 40, 41, 42,];

		static $yy_nxt = [
[
 1, 2, 3, 19, 2, 4, 51, 53, 53, 53, 19, 54, 53, 55, 53, 53, 56, 53, 53, 53,
 32, 22, 25, 19, 27, 29, 19, 53, 19,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 2, -1, -1, 2, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, 5, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 53, 38, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5,
 5, 5, 5, 5, 5, 5, 5, 5, 5,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, 14, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, 11, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 9, -1, 53, 53, 53, 53, 53, 53, 53, 53, 10,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
 21, 21, 21, 21, 21, 8, 24, 21, 21,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, 18, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 12, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
 21, 21, 21, 21, 21, 21, 21, 21, 21,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, 6, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 13, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, 7, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 15, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 16, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 17, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 20, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 23, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 26, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 28, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 30, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 31, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 33, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 44, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 34, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 45, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 46,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 52, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 47, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 35, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 36, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 49, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 50, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 37, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 40, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 48, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 41, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 53, 53, 53, 53, -1, 53, 53, 53, 42, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
],
[
 -1, -1, -1, -1, -1, 53, 43, 53, 53, 53, -1, 53, 53, 53, 53, 53, 53, 53, 53, 53,
 53, -1, -1, -1, -1, -1, -1, 53, 39,
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

					case 2: { return $this->createToken('GAP'); }
					case -3:
						break;

					case 3: { return $this->createToken(); }
					case -4:
						break;

					case 4: { return $this->createToken('T_LITERAL'); }
					case -5:
						break;

					case 5: { return $this->createToken('T_COMMENT'); }
					case -6:
						break;

					case 6: { return $this->createToken('T_COLON_ASSIGN'); }
					case -7:
						break;

					case 7: { return $this->createToken('T_ARROW_ASSIGN'); }
					case -8:
						break;

					case 8: { return $this->createToken('T_STRING'); }
					case -9:
						break;

					case 9: { return $this->createToken('T_VAL'); }
					case -10:
						break;

					case 10: { return $this->createToken('T_VAR'); }
					case -11:
						break;

					case 11: { return $this->createToken('T_TRIPLE_BACKQUOTE'); }
					case -12:
						break;

					case 12: { return $this->createToken('T_FINAL'); }
					case -13:
						break;

					case 13: { return $this->createToken('T_CLASS'); }
					case -14:
						break;

					case 14: { return $this->createToken('T_FINAL_FINAL'); }
					case -15:
						break;

					case 15: { return $this->createToken('T_DIRECT'); }
					case -16:
						break;

					case 16: { return $this->createToken('T_EXTENDS'); }
					case -17:
						break;

					case 17: { return $this->createToken('T_IMPLEMENTS'); }
					case -18:
						break;

					case 19: { return $this->createToken(); }
					case -19:
						break;

					case 20: { return $this->createToken('T_LITERAL'); }
					case -20:
						break;

					case 22: { return $this->createToken(); }
					case -21:
						break;

					case 23: { return $this->createToken('T_LITERAL'); }
					case -22:
						break;

					case 25: { return $this->createToken(); }
					case -23:
						break;

					case 26: { return $this->createToken('T_LITERAL'); }
					case -24:
						break;

					case 27: { return $this->createToken(); }
					case -25:
						break;

					case 28: { return $this->createToken('T_LITERAL'); }
					case -26:
						break;

					case 29: { return $this->createToken(); }
					case -27:
						break;

					case 30: { return $this->createToken('T_LITERAL'); }
					case -28:
						break;

					case 31: { return $this->createToken('T_LITERAL'); }
					case -29:
						break;

					case 32: { return $this->createToken('T_LITERAL'); }
					case -30:
						break;

					case 33: { return $this->createToken('T_LITERAL'); }
					case -31:
						break;

					case 34: { return $this->createToken('T_LITERAL'); }
					case -32:
						break;

					case 35: { return $this->createToken('T_LITERAL'); }
					case -33:
						break;

					case 36: { return $this->createToken('T_LITERAL'); }
					case -34:
						break;

					case 37: { return $this->createToken('T_LITERAL'); }
					case -35:
						break;

					case 38: { return $this->createToken('T_LITERAL'); }
					case -36:
						break;

					case 39: { return $this->createToken('T_LITERAL'); }
					case -37:
						break;

					case 40: { return $this->createToken('T_LITERAL'); }
					case -38:
						break;

					case 41: { return $this->createToken('T_LITERAL'); }
					case -39:
						break;

					case 42: { return $this->createToken('T_LITERAL'); }
					case -40:
						break;

					case 43: { return $this->createToken('T_LITERAL'); }
					case -41:
						break;

					case 44: { return $this->createToken('T_LITERAL'); }
					case -42:
						break;

					case 45: { return $this->createToken('T_LITERAL'); }
					case -43:
						break;

					case 46: { return $this->createToken('T_LITERAL'); }
					case -44:
						break;

					case 47: { return $this->createToken('T_LITERAL'); }
					case -45:
						break;

					case 48: { return $this->createToken('T_LITERAL'); }
					case -46:
						break;

					case 49: { return $this->createToken('T_LITERAL'); }
					case -47:
						break;

					case 50: { return $this->createToken('T_LITERAL'); }
					case -48:
						break;

					case 51: { return $this->createToken('T_LITERAL'); }
					case -49:
						break;

					case 52: { return $this->createToken('T_LITERAL'); }
					case -50:
						break;

					case 53: { return $this->createToken('T_LITERAL'); }
					case -51:
						break;

					case 54: { return $this->createToken('T_LITERAL'); }
					case -52:
						break;

					case 55: { return $this->createToken('T_LITERAL'); }
					case -53:
						break;

					case 56: { return $this->createToken('T_LITERAL'); }
					case -54:
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
