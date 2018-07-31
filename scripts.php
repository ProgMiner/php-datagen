<?php

/* MIT License

Copyright (c) 2018 Eridan Domoratskiy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. */

set_error_handler(function($num, $str, $file, $line) {
    throw new \ErrorException($str, 0, $num, $file, $line);
});

if (count($argv) < 2) {
    die("Usage: {$argv[0]} <command> [<args>]\n");
}

array_shift($argv);

$argv[0] = preg_replace('/\\W/', '_', $argv[0]);

try {
    call_user_func(...$argv);
} catch (\Throwable $e) {
    echo "Call \"help\" for command list\n";

    throw $e;
}

function _system($cmd, $doOutput = true) {
    exec($cmd, $output, $ret);

    if ($ret != 0) {
        die("\"$cmd\" returns not 0");
    }

    if ($doOutput) {
        echo ">>> $cmd\n";

        foreach ($output as $line) {
            echo "> $line\n";
        }
    }

    return $output;
}

function _scandir($dir) {
    if (is_file($dir)) {
        return [$dir];
    }

    $scanDir = function($dir) {
        $files = scandir($dir);

        $ret = [];
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $ret[] = "$dir/$file";
        }

        return $ret;
    };

    $ret = [];
    $files = $scanDir($dir);

    $ok = false;
    while (!$ok) {
        $ok = true;

        $ret = [];
        foreach ($files as $file) {
            if (!is_dir($file)) {
                $ret[] = $file;

                continue;
            }

            $ret = array_merge($ret, $scanDir($file));
            $ok = false;
        }

        $files = $ret;
    }

    return $ret;
};

function help() {
    echo "Available commands: install-deps, clean-deps, regen-all, regen-lexer, regen-parser.\n";
}

function install_deps() {
    $repos = [
        'jlex-php' => 'https://github.com/ProgMiner/jlex-php',
        'kmyacc'   => 'https://github.com/moriyoshi/kmyacc-forked',
    ];

    foreach ($repos as $target => $repo) {
        if (file_exists($target)) {
            echo "File \"$target\" is already exists.\n";
        } else {
            _system("git clone $repo $target");
        }
    }

    _system("cd jlex-php && mvn package");
    _system("cd kmyacc && make all");

    if (copy('kmyacc/src/kmyacc', 'kmyacc/kmyacc')) {
        chmod('kmyacc/kmyacc', stat('kmyacc/src/kmyacc')['mode'] ?? 0);
    } else {
        throw new Exception('File not copied');
    }
}

function clean_deps() {
    $dirs = ['jlex-php', 'kmyacc'];

    foreach ($dirs as $dir) {
        try {
            $files = _scandir($dir);

            foreach ($files as $file) {
                unlink($file);
            }

            rmdir($dir);
        } catch (\Throwable $e) {}
    }
}

function regen_lexer($dir = 'app') {
    $files = _scandir($dir);

    foreach ($files as $file) {
        if (preg_match('/(.*)\\.lex/', $file, $matches) !== 1) {
            continue;
        }

        $dest = $matches[1].".php";
        _system("java -jar jlex-php/JLexPHP.jar -v $file $dest");
    }
}

function regen_parser($dir = 'app') {
    $files = _scandir($dir);

    foreach ($files + ["$dir/PDGL.phpy"] as $file) {
        if (preg_match('/(.*)\\.phpy/', $file, $matches) !== 1) {
            continue;
        }

        $yacc = file_get_contents($file);

        $yacc = preg_replace('/\$\d+/', '$this->semStack[$0]', $yacc);

        file_put_contents('.regen-parser.tmp.phpy', $yacc);

        $model = $matches[1].".php.tpl";
        $dest = $matches[1].".php";

        _system("kmyacc/kmyacc -l -m $model .regen-parser.tmp.phpy");

        copy('.regen-parser.tmp.php', $dest);

        if ($file !== "$dir/PDGL.phpy") {
            copy($file, "$dir/PDGL.phpy");
        }
    }

    if (file_exists("$dir/PDGL.phpy")) {
        unlink("$dir/PDGL.phpy");
    }

    unlink(".regen-parser.tmp.phpy");
    unlink(".regen-parser.tmp.php");
}

function regen_all() {
    regen_lexer();
    regen_parser();
}
