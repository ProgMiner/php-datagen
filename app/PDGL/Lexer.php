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
		40
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
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NO_ANCHOR,
		/* 25 */ self::YY_NOT_ACCEPT,
		/* 26 */ self::YY_NO_ANCHOR,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NO_ANCHOR,
		/* 29 */ self::YY_NO_ANCHOR,
		/* 30 */ self::YY_NOT_ACCEPT,
		/* 31 */ self::YY_NO_ANCHOR,
		/* 32 */ self::YY_NO_ANCHOR,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NOT_ACCEPT,
		/* 35 */ self::YY_NO_ANCHOR,
		/* 36 */ self::YY_NO_ANCHOR,
		/* 37 */ self::YY_NOT_ACCEPT,
		/* 38 */ self::YY_NO_ANCHOR,
		/* 39 */ self::YY_NO_ANCHOR,
		/* 40 */ self::YY_NOT_ACCEPT,
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
		/* 62 */ self::YY_NO_ANCHOR,
		/* 63 */ self::YY_NO_ANCHOR,
		/* 64 */ self::YY_NO_ANCHOR,
		/* 65 */ self::YY_NO_ANCHOR,
		/* 66 */ self::YY_NO_ANCHOR,
		/* 67 */ self::YY_NO_ANCHOR,
		/* 68 */ self::YY_NO_ANCHOR,
		/* 69 */ self::YY_NO_ANCHOR,
		/* 70 */ self::YY_NO_ANCHOR,
		/* 71 */ self::YY_NO_ANCHOR,
		/* 72 */ self::YY_NO_ANCHOR,
		/* 73 */ self::YY_NO_ANCHOR,
		/* 74 */ self::YY_NO_ANCHOR,
		/* 75 */ self::YY_NO_ANCHOR,
		/* 76 */ self::YY_NO_ANCHOR,
		/* 77 */ self::YY_NO_ANCHOR,
		/* 78 */ self::YY_NO_ANCHOR,
		/* 79 */ self::YY_NO_ANCHOR,
		/* 80 */ self::YY_NO_ANCHOR,
		/* 81 */ self::YY_NO_ANCHOR,
		/* 82 */ self::YY_NO_ANCHOR,
		/* 83 */ self::YY_NO_ANCHOR,
		/* 84 */ self::YY_NO_ANCHOR,
		/* 85 */ self::YY_NO_ANCHOR,
		/* 86 */ self::YY_NO_ANCHOR,
		/* 87 */ self::YY_NO_ANCHOR,
		/* 88 */ self::YY_NO_ANCHOR,
		/* 89 */ self::YY_NO_ANCHOR,
		/* 90 */ self::YY_NO_ANCHOR,
		/* 91 */ self::YY_NO_ANCHOR,
		/* 92 */ self::YY_NO_ANCHOR
	];
		static $yy_cmap = [
 1, 1, 1, 1, 1, 1, 1, 1, 3, 3, 4, 1, 3, 4, 1, 1, 1, 1, 1, 1,
 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 2, 1, 1, 1, 1, 26,
 1, 1, 1, 1, 1, 24, 1, 5, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 29, 1,
 31, 30, 1, 1, 1, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32,
 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 1, 27, 1, 1, 32, 28, 9, 23, 11,
 16, 13, 6, 32, 32, 7, 32, 32, 10, 17, 8, 21, 18, 32, 19, 12, 15, 22, 20, 32,
 14, 32, 32, 1, 1, 1, 1, 1, 0, 0,];

		static $yy_rmap = [
 0, 1, 1, 1, 2, 3, 4, 1, 1, 1, 5, 5, 1, 5, 5, 5, 5, 5, 5, 5,
 5, 5, 5, 5, 1, 6, 6, 7, 8, 2, 9, 4, 10, 6, 11, 9, 12, 13, 14, 15,
 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35,
 36, 37, 38, 39, 40, 41, 5, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54,
 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 5, 65, 66,];

		static $yy_nxt = [
[
 1, 2, 3, 4, 4, 26, 5, 88, 90, 90, 90, 91, 90, 63, 90, 90, 64, 90, 92, 90,
 51, 90, 90, 90, 31, 6, 35, 2, 38, 41, 2, 43, 90,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, 4, 4, 25, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 90, 65, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, 6, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, 27, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
],
[
 -1, 27, 27, 27, 4, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27,
 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 10, 90, 90, 90, 90, 90, 90, 90, 90, 11,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30,
 30, 30, 30, 30, 30, 30, 7, 34, 30, 30, 30, 30, 30,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 13, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, 30, 30, 30, -1, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30,
 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 14, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 12, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 37, -1, -1, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 15, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 1, 24, 24, 29, 4, 33, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 8, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 16, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 9, -1, -1,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 17, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 18, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 19, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 20, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 21, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 22, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 23, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 28, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 32, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 36, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 39, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 42, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 44, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 45, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 46, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 47, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 48, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 49, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 50, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 52, 90, 90, 90, 90, 90, 70, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 71, 90, 53, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 54, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 74, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 55, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 56, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 75, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 76,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 77, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 78, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 79, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 89, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 80, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 57, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 81, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 82, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 58, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 59, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 60, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 84, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 85, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 86, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 87, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 61, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 62, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 67, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 83, 90, 90, 90, 90, 90, 90,
 90, 90, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 68, 90, 90, 90, 90, 90, 90, 90, 90, 90,
 90, 69, 90, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
],
[
 -1, -1, -1, -1, -1, -1, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 72,
 90, 90, 73, 90, -1, 66, -1, -1, -1, -1, -1, -1, 90,
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

					case 13: { return $this->createToken(PDGL::T_ENUM); }
					case -14:
						break;

					case 14: { return $this->createToken(PDGL::T_DATA); }
					case -15:
						break;

					case 15: { return $this->createToken(PDGL::T_FINAL); }
					case -16:
						break;

					case 16: { return $this->createToken(PDGL::T_CLASS); }
					case -17:
						break;

					case 17: { return $this->createToken(PDGL::T_CONST); }
					case -18:
						break;

					case 18: { return $this->createToken(PDGL::T_DIRECT); }
					case -19:
						break;

					case 19: { return $this->createToken(PDGL::T_PUBLIC); }
					case -20:
						break;

					case 20: { return $this->createToken(PDGL::T_EXTENDS); }
					case -21:
						break;

					case 21: { return $this->createToken(PDGL::T_PRIVATE); }
					case -22:
						break;

					case 22: { return $this->createToken(PDGL::T_PROTECTED); }
					case -23:
						break;

					case 23: { return $this->createToken(PDGL::T_IMPLEMENTS); }
					case -24:
						break;

					case 24: { return $this->handleStringDQ(); }
					case -25:
						break;

					case 26: { return $this->createToken(); }
					case -26:
						break;

					case 27: {
    $token = $this->createToken(PDGL::T_GAP);
    $this->gaps[] = $token;
    if ($this->sendGaps) {
        return $token;
    }
}
					case -27:
						break;

					case 28: { return $this->createToken(PDGL::T_LITERAL); }
					case -28:
						break;

					case 29: { return $this->handleStringDQ(); }
					case -29:
						break;

					case 31: { return $this->createToken(); }
					case -30:
						break;

					case 32: { return $this->createToken(PDGL::T_LITERAL); }
					case -31:
						break;

					case 33: { return $this->handleStringDQ(); }
					case -32:
						break;

					case 35: { return $this->createToken(); }
					case -33:
						break;

					case 36: { return $this->createToken(PDGL::T_LITERAL); }
					case -34:
						break;

					case 38: { return $this->createToken(); }
					case -35:
						break;

					case 39: { return $this->createToken(PDGL::T_LITERAL); }
					case -36:
						break;

					case 41: { return $this->createToken(); }
					case -37:
						break;

					case 42: { return $this->createToken(PDGL::T_LITERAL); }
					case -38:
						break;

					case 43: { return $this->createToken(); }
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

					case 63: { return $this->createToken(PDGL::T_LITERAL); }
					case -59:
						break;

					case 64: { return $this->createToken(PDGL::T_LITERAL); }
					case -60:
						break;

					case 65: { return $this->createToken(PDGL::T_LITERAL); }
					case -61:
						break;

					case 66: { return $this->createToken(PDGL::T_LITERAL); }
					case -62:
						break;

					case 67: { return $this->createToken(PDGL::T_LITERAL); }
					case -63:
						break;

					case 68: { return $this->createToken(PDGL::T_LITERAL); }
					case -64:
						break;

					case 69: { return $this->createToken(PDGL::T_LITERAL); }
					case -65:
						break;

					case 70: { return $this->createToken(PDGL::T_LITERAL); }
					case -66:
						break;

					case 71: { return $this->createToken(PDGL::T_LITERAL); }
					case -67:
						break;

					case 72: { return $this->createToken(PDGL::T_LITERAL); }
					case -68:
						break;

					case 73: { return $this->createToken(PDGL::T_LITERAL); }
					case -69:
						break;

					case 74: { return $this->createToken(PDGL::T_LITERAL); }
					case -70:
						break;

					case 75: { return $this->createToken(PDGL::T_LITERAL); }
					case -71:
						break;

					case 76: { return $this->createToken(PDGL::T_LITERAL); }
					case -72:
						break;

					case 77: { return $this->createToken(PDGL::T_LITERAL); }
					case -73:
						break;

					case 78: { return $this->createToken(PDGL::T_LITERAL); }
					case -74:
						break;

					case 79: { return $this->createToken(PDGL::T_LITERAL); }
					case -75:
						break;

					case 80: { return $this->createToken(PDGL::T_LITERAL); }
					case -76:
						break;

					case 81: { return $this->createToken(PDGL::T_LITERAL); }
					case -77:
						break;

					case 82: { return $this->createToken(PDGL::T_LITERAL); }
					case -78:
						break;

					case 83: { return $this->createToken(PDGL::T_LITERAL); }
					case -79:
						break;

					case 84: { return $this->createToken(PDGL::T_LITERAL); }
					case -80:
						break;

					case 85: { return $this->createToken(PDGL::T_LITERAL); }
					case -81:
						break;

					case 86: { return $this->createToken(PDGL::T_LITERAL); }
					case -82:
						break;

					case 87: { return $this->createToken(PDGL::T_LITERAL); }
					case -83:
						break;

					case 88: { return $this->createToken(PDGL::T_LITERAL); }
					case -84:
						break;

					case 89: { return $this->createToken(PDGL::T_LITERAL); }
					case -85:
						break;

					case 90: { return $this->createToken(PDGL::T_LITERAL); }
					case -86:
						break;

					case 91: { return $this->createToken(PDGL::T_LITERAL); }
					case -87:
						break;

					case 92: { return $this->createToken(PDGL::T_LITERAL); }
					case -88:
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
