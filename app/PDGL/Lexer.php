<?php
namespace PHPDataGen\PDGL;
use JLexPHP\Token;
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

    public $sendGaps = false;
    protected $gaps = [];
    protected $lastToken = null;
    public function createToken(?int $type = null): Token {
        $token = parent::createToken($type);
        $this->lastToken = $token;
        return $token;
    }
    public function getGaps(bool $clean = true): array {
        $gaps = $this->gaps;
        if ($clean) {
            $this->gaps = [];
        }
        return $gaps;
    }
    protected function handleStringDQ(bool $init = false) {
        static $depth = 0;
        static $quotes = [];
        static $buf = '';
        if ($init) {
            $this->yybegin(self::STRING_DQ);
            $depth = 0;
            $quotes = [];
            $buf = '';
        }
        if ($depth === count($quotes)) {
            if (in_array($this->yytext(), ["'", '"'])) {
                $quotes[] = $this->yytext();
            } else if ($this->yytext() === '}') {
                --$depth;
            }
        } else if ($depth < count($quotes)) {
            if ($buf === '\\') {
                $buf = '';
            } else if ($buf === '$') {
                if ($this->yytext() === '{') {
                    ++$depth;
                }
                $buf = '';
            } else {
                if ($this->yytext() === '\\') {
                    $buf = '\\';
                } else if ($quotes[count($quotes) - 1] === '"' && $this->yytext() === '$') {
                    $buf = '$';
                } else if ($this->yytext() === $quotes[count($quotes) - 1]) {
                    array_pop($quotes);
                }
            }
        }
        if ($depth === 0 && empty($quotes)) {
            $this->yybegin(self::YYINITIAL);
        }
        return $this->createToken(PDGL::T_STRING_DQ);
    }
	protected $yy_count_chars = true;
	protected $yy_count_lines = true;

	public function __construct($stream) {
		parent::__construct($stream);
		$this->yy_lexical_state = self::YYINITIAL;
	}

	const STRING_DQ = 1;
	const YYINITIAL = 0;
	protected static $yy_state_dtrans = [
		0,
		34
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
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NOT_ACCEPT,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NOT_ACCEPT,
		/* 25 */ self::YY_NO_ANCHOR,
		/* 26 */ self::YY_NO_ANCHOR,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NOT_ACCEPT,
		/* 29 */ self::YY_NO_ANCHOR,
		/* 30 */ self::YY_NO_ANCHOR,
		/* 31 */ self::YY_NOT_ACCEPT,
		/* 32 */ self::YY_NO_ANCHOR,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NOT_ACCEPT,
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
		/* 56 */ self::YY_NO_ANCHOR,
		/* 57 */ self::YY_NO_ANCHOR,
		/* 58 */ self::YY_NO_ANCHOR,
		/* 59 */ self::YY_NO_ANCHOR,
		/* 60 */ self::YY_NO_ANCHOR,
		/* 61 */ self::YY_NO_ANCHOR,
		/* 62 */ self::YY_NO_ANCHOR
	];
		static $yy_cmap = [
 1, 1, 1, 1, 1, 1, 1, 1, 3, 3, 4, 1, 3, 4, 1, 1, 1, 1, 1, 1,
 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 2, 1, 1, 1, 1, 22,
 1, 1, 1, 1, 1, 1, 1, 5, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 25, 1,
 27, 26, 1, 1, 1, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28,
 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 1, 23, 1, 1, 28, 24, 9, 28, 11,
 16, 13, 6, 28, 28, 7, 28, 28, 10, 17, 8, 28, 18, 28, 19, 12, 15, 28, 20, 28,
 14, 28, 28, 1, 1, 1, 1, 1, 0, 0,];

		static $yy_rmap = [
 0, 1, 1, 1, 2, 3, 4, 1, 1, 1, 5, 5, 1, 5, 5, 5, 5, 5, 1, 6,
 6, 7, 8, 2, 9, 9, 10, 6, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
 23, 24, 25, 26, 27, 5, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 5,
 41, 42, 43,];

		static $yy_nxt = [
[
 1, 2, 3, 4, 4, 20, 5, 57, 59, 59, 59, 60, 59, 61, 59, 59, 62, 59, 59, 59,
 38, 6, 25, 2, 29, 32, 2, 35, 59,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, 4, 4, 19, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 59, 44, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, 6, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, 21, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 21, 21, 21, 4, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
 21, 21, 21, 21, 21, 21, 21, 21, 21,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 10, 59, 59, 59, 59, 59, 59, 59, 59, 11,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
 24, 24, 7, 28, 24, 24, 24, 24, 24,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 13, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, 24, 24, 24, -1, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
 24, 24, 24, 24, 24, 24, 24, 24, 24,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, 31, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 14, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, 12, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, 8, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 15, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 1, 18, 18, 23, 4, 27, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18,
 18, 18, 18, 18, 18, 18, 18, 18, 18,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, 9, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 16, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 17, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 22, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 26, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 30, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 33, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 36, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 37, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 39, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 50, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 40, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 51, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 52,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 58, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 53, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 41, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 42, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 55, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 56, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 43, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 46, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 54, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 47, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 59, 59, 59, 59, 59, 59, 59, 48, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
],
[
 -1, -1, -1, -1, -1, -1, 59, 49, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59, 59,
 59, 45, -1, -1, -1, -1, -1, -1, 59,
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

					case 2: { return $this->createToken(); }
					case -3:
						break;

					case 3: { return $this->handleStringDQ(true); }
					case -4:
						break;

					case 4: {
    $token = $this->createToken(PDGL::T_GAP);
    $this->gaps[] = $token;
    if ($this->sendGaps) {
        return $token;
    }
}
					case -5:
						break;

					case 5: { return $this->createToken(PDGL::T_LITERAL); }
					case -6:
						break;

					case 6: { return $this->createToken(PDGL::T_NUMBER); }
					case -7:
						break;

					case 7: { return $this->createToken(PDGL::T_STRING_SQ); }
					case -8:
						break;

					case 8: { return $this->createToken(PDGL::T_COLON_ASSIGN); }
					case -9:
						break;

					case 9: { return $this->createToken(PDGL::T_ARROW_ASSIGN); }
					case -10:
						break;

					case 10: { return $this->createToken(PDGL::T_VAL); }
					case -11:
						break;

					case 11: { return $this->createToken(PDGL::T_VAR); }
					case -12:
						break;

					case 12: { return $this->createToken(PDGL::T_TRIPLE_BACKQUOTE); }
					case -13:
						break;

					case 13: { return $this->createToken(PDGL::T_FINAL); }
					case -14:
						break;

					case 14: { return $this->createToken(PDGL::T_CLASS); }
					case -15:
						break;

					case 15: { return $this->createToken(PDGL::T_DIRECT); }
					case -16:
						break;

					case 16: { return $this->createToken(PDGL::T_EXTENDS); }
					case -17:
						break;

					case 17: { return $this->createToken(PDGL::T_IMPLEMENTS); }
					case -18:
						break;

					case 18: { return $this->handleStringDQ(); }
					case -19:
						break;

					case 20: { return $this->createToken(); }
					case -20:
						break;

					case 21: {
    $token = $this->createToken(PDGL::T_GAP);
    $this->gaps[] = $token;
    if ($this->sendGaps) {
        return $token;
    }
}
					case -21:
						break;

					case 22: { return $this->createToken(PDGL::T_LITERAL); }
					case -22:
						break;

					case 23: { return $this->handleStringDQ(); }
					case -23:
						break;

					case 25: { return $this->createToken(); }
					case -24:
						break;

					case 26: { return $this->createToken(PDGL::T_LITERAL); }
					case -25:
						break;

					case 27: { return $this->handleStringDQ(); }
					case -26:
						break;

					case 29: { return $this->createToken(); }
					case -27:
						break;

					case 30: { return $this->createToken(PDGL::T_LITERAL); }
					case -28:
						break;

					case 32: { return $this->createToken(); }
					case -29:
						break;

					case 33: { return $this->createToken(PDGL::T_LITERAL); }
					case -30:
						break;

					case 35: { return $this->createToken(); }
					case -31:
						break;

					case 36: { return $this->createToken(PDGL::T_LITERAL); }
					case -32:
						break;

					case 37: { return $this->createToken(PDGL::T_LITERAL); }
					case -33:
						break;

					case 38: { return $this->createToken(PDGL::T_LITERAL); }
					case -34:
						break;

					case 39: { return $this->createToken(PDGL::T_LITERAL); }
					case -35:
						break;

					case 40: { return $this->createToken(PDGL::T_LITERAL); }
					case -36:
						break;

					case 41: { return $this->createToken(PDGL::T_LITERAL); }
					case -37:
						break;

					case 42: { return $this->createToken(PDGL::T_LITERAL); }
					case -38:
						break;

					case 43: { return $this->createToken(PDGL::T_LITERAL); }
					case -39:
						break;

					case 44: { return $this->createToken(PDGL::T_LITERAL); }
					case -40:
						break;

					case 45: { return $this->createToken(PDGL::T_LITERAL); }
					case -41:
						break;

					case 46: { return $this->createToken(PDGL::T_LITERAL); }
					case -42:
						break;

					case 47: { return $this->createToken(PDGL::T_LITERAL); }
					case -43:
						break;

					case 48: { return $this->createToken(PDGL::T_LITERAL); }
					case -44:
						break;

					case 49: { return $this->createToken(PDGL::T_LITERAL); }
					case -45:
						break;

					case 50: { return $this->createToken(PDGL::T_LITERAL); }
					case -46:
						break;

					case 51: { return $this->createToken(PDGL::T_LITERAL); }
					case -47:
						break;

					case 52: { return $this->createToken(PDGL::T_LITERAL); }
					case -48:
						break;

					case 53: { return $this->createToken(PDGL::T_LITERAL); }
					case -49:
						break;

					case 54: { return $this->createToken(PDGL::T_LITERAL); }
					case -50:
						break;

					case 55: { return $this->createToken(PDGL::T_LITERAL); }
					case -51:
						break;

					case 56: { return $this->createToken(PDGL::T_LITERAL); }
					case -52:
						break;

					case 57: { return $this->createToken(PDGL::T_LITERAL); }
					case -53:
						break;

					case 58: { return $this->createToken(PDGL::T_LITERAL); }
					case -54:
						break;

					case 59: { return $this->createToken(PDGL::T_LITERAL); }
					case -55:
						break;

					case 60: { return $this->createToken(PDGL::T_LITERAL); }
					case -56:
						break;

					case 61: { return $this->createToken(PDGL::T_LITERAL); }
					case -57:
						break;

					case 62: { return $this->createToken(PDGL::T_LITERAL); }
					case -58:
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
