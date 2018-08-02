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
		/* 15 */ self::YY_NO_ANCHOR,
		/* 16 */ self::YY_NOT_ACCEPT,
		/* 17 */ self::YY_NO_ANCHOR,
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NOT_ACCEPT,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NOT_ACCEPT,
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
		/* 51 */ self::YY_NO_ANCHOR,
		/* 52 */ self::YY_NO_ANCHOR,
		/* 53 */ self::YY_NO_ANCHOR,
		/* 54 */ self::YY_NO_ANCHOR,
		/* 55 */ self::YY_NO_ANCHOR
	];
		static $yy_cmap = [
 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 1, 3, 4, 1, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 24, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 2, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 21, 3,
 23, 22, 3, 3, 3, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26,
 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 3, 25, 3, 3, 26, 20, 8, 26, 10,
 15, 12, 5, 26, 26, 6, 26, 26, 9, 16, 7, 26, 17, 26, 18, 11, 14, 26, 19, 26,
 13, 26, 26, 3, 3, 3, 3, 3, 0, 0,];

		static $yy_rmap = [
 0, 1, 2, 3, 4, 1, 1, 1, 5, 5, 1, 5, 5, 5, 5, 5, 6, 7, 1, 8,
 9, 10, 11, 12, 13, 14, 15, 16, 9, 17, 18, 19, 20, 21, 22, 23, 24, 25, 5, 26,
 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 5, 39, 40, 41,];

		static $yy_nxt = [
[
 1, 2, 3, 18, 2, 4, 50, 52, 52, 52, 53, 52, 54, 52, 52, 55, 52, 52, 52, 31,
 21, 24, 18, 26, 28, 18, 52, 18,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 2, -1, -1, 2, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, 17, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 52, 37, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 10, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17,
 17, 17, 17, 17, 17, 17, 17, 17,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 8, 52, 52, 52, 52, 52, 52, 52, 52, 9, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20,
 20, 20, 20, 20, 7, 23, 20, 20,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 16, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 11, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20,
 20, 20, 20, 20, 20, 20, 20, 20,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, 5, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 12, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, 6, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 13, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 14, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 15, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 19, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 22, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 25, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 27, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 29, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 30, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 32, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 43, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 33, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 44, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 45, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 51, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 46, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 34, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 35, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 48, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 49, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 36, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 39, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 47, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 40, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 52, 52, 52, 52, 52, 52, 52, 41, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
],
[
 -1, -1, -1, -1, -1, 52, 42, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52, 52,
 -1, -1, -1, -1, -1, -1, 52, 38,
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

					case 7: { return $this->createToken(PDGL::T_STRING); }
					case -8:
						break;

					case 8: { return $this->createToken(PDGL::T_VAL); }
					case -9:
						break;

					case 9: { return $this->createToken(PDGL::T_VAR); }
					case -10:
						break;

					case 10: { return $this->createToken(PDGL::T_TRIPLE_BACKQUOTE); }
					case -11:
						break;

					case 11: { return $this->createToken(PDGL::T_FINAL); }
					case -12:
						break;

					case 12: { return $this->createToken(PDGL::T_CLASS); }
					case -13:
						break;

					case 13: { return $this->createToken(PDGL::T_DIRECT); }
					case -14:
						break;

					case 14: { return $this->createToken(PDGL::T_EXTENDS); }
					case -15:
						break;

					case 15: { return $this->createToken(PDGL::T_IMPLEMENTS); }
					case -16:
						break;

					case 17: { $this->gaps[] = $this->yytext(); }
					case -17:
						break;

					case 18: { return $this->createToken(); }
					case -18:
						break;

					case 19: { return $this->createToken(PDGL::T_LITERAL); }
					case -19:
						break;

					case 21: { return $this->createToken(); }
					case -20:
						break;

					case 22: { return $this->createToken(PDGL::T_LITERAL); }
					case -21:
						break;

					case 24: { return $this->createToken(); }
					case -22:
						break;

					case 25: { return $this->createToken(PDGL::T_LITERAL); }
					case -23:
						break;

					case 26: { return $this->createToken(); }
					case -24:
						break;

					case 27: { return $this->createToken(PDGL::T_LITERAL); }
					case -25:
						break;

					case 28: { return $this->createToken(); }
					case -26:
						break;

					case 29: { return $this->createToken(PDGL::T_LITERAL); }
					case -27:
						break;

					case 30: { return $this->createToken(PDGL::T_LITERAL); }
					case -28:
						break;

					case 31: { return $this->createToken(PDGL::T_LITERAL); }
					case -29:
						break;

					case 32: { return $this->createToken(PDGL::T_LITERAL); }
					case -30:
						break;

					case 33: { return $this->createToken(PDGL::T_LITERAL); }
					case -31:
						break;

					case 34: { return $this->createToken(PDGL::T_LITERAL); }
					case -32:
						break;

					case 35: { return $this->createToken(PDGL::T_LITERAL); }
					case -33:
						break;

					case 36: { return $this->createToken(PDGL::T_LITERAL); }
					case -34:
						break;

					case 37: { return $this->createToken(PDGL::T_LITERAL); }
					case -35:
						break;

					case 38: { return $this->createToken(PDGL::T_LITERAL); }
					case -36:
						break;

					case 39: { return $this->createToken(PDGL::T_LITERAL); }
					case -37:
						break;

					case 40: { return $this->createToken(PDGL::T_LITERAL); }
					case -38:
						break;

					case 41: { return $this->createToken(PDGL::T_LITERAL); }
					case -39:
						break;

					case 42: { return $this->createToken(PDGL::T_LITERAL); }
					case -40:
						break;

					case 43: { return $this->createToken(PDGL::T_LITERAL); }
					case -41:
						break;

					case 44: { return $this->createToken(PDGL::T_LITERAL); }
					case -42:
						break;

					case 45: { return $this->createToken(PDGL::T_LITERAL); }
					case -43:
						break;

					case 46: { return $this->createToken(PDGL::T_LITERAL); }
					case -44:
						break;

					case 47: { return $this->createToken(PDGL::T_LITERAL); }
					case -45:
						break;

					case 48: { return $this->createToken(PDGL::T_LITERAL); }
					case -46:
						break;

					case 49: { return $this->createToken(PDGL::T_LITERAL); }
					case -47:
						break;

					case 50: { return $this->createToken(PDGL::T_LITERAL); }
					case -48:
						break;

					case 51: { return $this->createToken(PDGL::T_LITERAL); }
					case -49:
						break;

					case 52: { return $this->createToken(PDGL::T_LITERAL); }
					case -50:
						break;

					case 53: { return $this->createToken(PDGL::T_LITERAL); }
					case -51:
						break;

					case 54: { return $this->createToken(PDGL::T_LITERAL); }
					case -52:
						break;

					case 55: { return $this->createToken(PDGL::T_LITERAL); }
					case -53:
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
