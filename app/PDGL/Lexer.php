<?php
// vim:noexpandtab
namespace PHPDataGen\PDGL;
use PHPDataGen\PDGL;

class Lexer extends \JLexPHP\AbstractLexer  {
	const YY_BUFFER_SIZE = 512;
	const YY_F = -1;
	const YY_NO_STATE = -1;
	const YY_NOT_ACCEPT = 0;
	const YY_START = 1;
	const YY_END = 2;
	const YY_NO_ANCHOR = 4;
	const YY_BOL = 128;
	const YY_EOF = 129;

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
	protected $yy_count_chars = true;
	protected $yy_count_lines = true;

	public function __construct($stream) {
		parent::__construct($stream);
		$this->yy_lexical_state = self::YYINITIAL;
	}

	const YYINITIAL = 0;
	protected static $yy_state_dtrans = [
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
		/* 15 */ self::YY_NOT_ACCEPT,
		/* 16 */ self::YY_NO_ANCHOR,
		/* 17 */ self::YY_NO_ANCHOR,
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NO_ANCHOR,
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
		/* 51 */ self::YY_NO_ANCHOR
	];
		static $yy_cmap = [
 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 1, 3, 4, 1, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 2, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 21, 3,
 23, 22, 3, 3, 3, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 3, 3, 3, 3, 24, 20, 8, 24, 10,
 15, 12, 5, 24, 24, 6, 24, 24, 9, 16, 7, 24, 17, 24, 18, 11, 14, 24, 19, 24,
 13, 24, 24, 3, 3, 3, 3, 3, 0, 0,];

		static $yy_rmap = [
 0, 1, 2, 3, 4, 1, 1, 5, 5, 1, 5, 5, 5, 5, 5, 6, 7, 1, 8, 9,
 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 5, 24, 25, 26, 27, 28,
 29, 30, 31, 32, 33, 34, 35, 36, 5, 37, 38, 39,];

		static $yy_nxt = [
[
 1, 2, 3, 17, 2, 4, 46, 48, 48, 48, 49, 48, 50, 48, 48, 51, 48, 48, 48, 27,
 19, 21, 17, 23, 48, 17,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1,
],
[
 -1, 2, -1, -1, 2, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, 16, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 48, 33, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 9, -1, -1, -1, -1, -1,
],
[
 -1, -1, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16,
 16, 16, 16, 16, 16, 16,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 7, 48, 48, 48, 48, 48, 48, 48, 48, 8, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 15, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 10, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, 5, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 11, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, 6, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 12, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 13, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 14, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 18, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 20, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 22, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 24, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 25, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 26, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 28, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 39, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 29, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 40, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 41, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 47, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 42, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 30, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 31, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 44, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 45, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 32, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 35, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 43, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 36, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 48, 48, 48, 48, 48, 48, 48, 37, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
],
[
 -1, -1, -1, -1, -1, 48, 38, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48, 48,
 -1, -1, -1, -1, 48, 34,
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

					case 2: { $this->gaps[] = $this->yytext(); }
					case -3:
						break;

					case 3: { return $this->createToken(); }
					case -4:
						break;

					case 4: { return $this->createToken(PDGL::T_LITERAL); }
					case -5:
						break;

					case 5: { return $this->createToken(PDGL::T_COLON_ASSIGN); }
					case -6:
						break;

					case 6: { return $this->createToken(PDGL::T_ARROW_ASSIGN); }
					case -7:
						break;

					case 7: { return $this->createToken(PDGL::T_VAL); }
					case -8:
						break;

					case 8: { return $this->createToken(PDGL::T_VAR); }
					case -9:
						break;

					case 9: { return $this->createToken(PDGL::T_TRIPLE_BACKQUOTE); }
					case -10:
						break;

					case 10: { return $this->createToken(PDGL::T_FINAL); }
					case -11:
						break;

					case 11: { return $this->createToken(PDGL::T_CLASS); }
					case -12:
						break;

					case 12: { return $this->createToken(PDGL::T_DIRECT); }
					case -13:
						break;

					case 13: { return $this->createToken(PDGL::T_EXTENDS); }
					case -14:
						break;

					case 14: { return $this->createToken(PDGL::T_IMPLEMENTS); }
					case -15:
						break;

					case 16: { $this->gaps[] = $this->yytext(); }
					case -16:
						break;

					case 17: { return $this->createToken(); }
					case -17:
						break;

					case 18: { return $this->createToken(PDGL::T_LITERAL); }
					case -18:
						break;

					case 19: { return $this->createToken(); }
					case -19:
						break;

					case 20: { return $this->createToken(PDGL::T_LITERAL); }
					case -20:
						break;

					case 21: { return $this->createToken(); }
					case -21:
						break;

					case 22: { return $this->createToken(PDGL::T_LITERAL); }
					case -22:
						break;

					case 23: { return $this->createToken(); }
					case -23:
						break;

					case 24: { return $this->createToken(PDGL::T_LITERAL); }
					case -24:
						break;

					case 25: { return $this->createToken(PDGL::T_LITERAL); }
					case -25:
						break;

					case 26: { return $this->createToken(PDGL::T_LITERAL); }
					case -26:
						break;

					case 27: { return $this->createToken(PDGL::T_LITERAL); }
					case -27:
						break;

					case 28: { return $this->createToken(PDGL::T_LITERAL); }
					case -28:
						break;

					case 29: { return $this->createToken(PDGL::T_LITERAL); }
					case -29:
						break;

					case 30: { return $this->createToken(PDGL::T_LITERAL); }
					case -30:
						break;

					case 31: { return $this->createToken(PDGL::T_LITERAL); }
					case -31:
						break;

					case 32: { return $this->createToken(PDGL::T_LITERAL); }
					case -32:
						break;

					case 33: { return $this->createToken(PDGL::T_LITERAL); }
					case -33:
						break;

					case 34: { return $this->createToken(PDGL::T_LITERAL); }
					case -34:
						break;

					case 35: { return $this->createToken(PDGL::T_LITERAL); }
					case -35:
						break;

					case 36: { return $this->createToken(PDGL::T_LITERAL); }
					case -36:
						break;

					case 37: { return $this->createToken(PDGL::T_LITERAL); }
					case -37:
						break;

					case 38: { return $this->createToken(PDGL::T_LITERAL); }
					case -38:
						break;

					case 39: { return $this->createToken(PDGL::T_LITERAL); }
					case -39:
						break;

					case 40: { return $this->createToken(PDGL::T_LITERAL); }
					case -40:
						break;

					case 41: { return $this->createToken(PDGL::T_LITERAL); }
					case -41:
						break;

					case 42: { return $this->createToken(PDGL::T_LITERAL); }
					case -42:
						break;

					case 43: { return $this->createToken(PDGL::T_LITERAL); }
					case -43:
						break;

					case 44: { return $this->createToken(PDGL::T_LITERAL); }
					case -44:
						break;

					case 45: { return $this->createToken(PDGL::T_LITERAL); }
					case -45:
						break;

					case 46: { return $this->createToken(PDGL::T_LITERAL); }
					case -46:
						break;

					case 47: { return $this->createToken(PDGL::T_LITERAL); }
					case -47:
						break;

					case 48: { return $this->createToken(PDGL::T_LITERAL); }
					case -48:
						break;

					case 49: { return $this->createToken(PDGL::T_LITERAL); }
					case -49:
						break;

					case 50: { return $this->createToken(PDGL::T_LITERAL); }
					case -50:
						break;

					case 51: { return $this->createToken(PDGL::T_LITERAL); }
					case -51:
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
