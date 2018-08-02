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
    if ($doOutput) {
        echo ">>> $cmd\n";
    }

    exec($cmd, $output, $ret);

    if ($ret != 0) {
        die("\"$cmd\" returns not 0");
    }

    if ($doOutput) {
        foreach ($output as $line) {
            echo "> $line\n";
        }
    }

    return $output;
}

function _scandir($dir, &$dirs = null) {
    if (is_file($dir)) {
        return [$dir];
    }

    $dirs = [];

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

            $dirs[] = $file;
            $ret = array_merge($ret, $scanDir($file));
            $ok = false;
        }

        $files = $ret;
    }

    sort($dirs);
    array_unique($dirs);

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
            $files = _scandir($dir, $innerDirs);

            foreach ($files as $file) {
                unlink($file);
            }

            $dirsA = [];
            while (!empty($innerDirs)) {
                foreach ($innerDirs as $innerDir) {
                    try {
                        rmdir($innerDir);
                    } catch (\Throwable $e) {
                        $dirsA[] = $innerDir;
                    }
                }

                $innerDirs = $dirsA;
                $dirsA = [];
            }

            rmdir($dir);
        } catch (\Throwable $e) {}
    }
}

function regen_lexer($dir = 'app', $debug = 'false') {
    $files = _scandir($dir);

    foreach ($files as $file) {
        if (preg_match('/^(.*)\\.lex$/', $file, $matches) !== 1) {
            continue;
        }

        $options = ($debug === 'true' or $debug === true)?
            '-v': '';

        $dest = $matches[1].".php";
        _system("java -jar jlex-php/JLexPHP.jar $options $file $dest");
    }
}

function regen_parser($dir = 'app', $debug = 'false') {
    $files = _scandir($dir);

    $files[] = "$dir/PDGL.phpy";
    foreach ($files as $file) {
        if (preg_match('/^(.*)\\.phpy$/', $file, $matches) !== 1) {
            continue;
        }

        $options = ($debug === 'true' or $debug === true)?
            '-t': '';

        $name = explode(DIRECTORY_SEPARATOR, $matches[1]);
        $name = $name[count($name) - 1];

        $model = $matches[1].".php.tpl";
        _system("kmyacc/kmyacc $options -l -p $name -m $model $file");

        if ($file !== "$dir/PDGL.phpy") {
            copy($file, "$dir/PDGL.phpy");
        }
    }

    if (file_exists("$dir/PDGL.phpy")) {
        unlink("$dir/PDGL.phpy");
    }
}

function regen_all($dir = 'app', $debug = 'false') {
    regen_lexer($dir, $debug);
    regen_parser($dir, $debug);
}
