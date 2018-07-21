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

namespace PHPDataGen\Command;

use Symfony\Component\Console\Output;
use Symfony\Component\Console\Input;
use Symfony\Component\Console\Style;

use Symfony\Component\Finder\Finder;

use PhpParser\PrettyPrinter;

use PHPDataGen\Compiler;

/**
 * Build command
 *
 * @author Eridan Domoratskiy <eridan200@mail.ru>
 */
class Build extends Compile {

    protected function configure() {
        $this->
            setName('build')->
            setDescription('Runs full project building')->
            setHelp("Reads config file from project-dir (if exists).\nScans project directory for files with extension .pdata and compiles it.")->

            addArgument('project-dir', Input\InputArgument::OPTIONAL, 'Path to project directory (default is current directory)')->

            addOption('not-replace',    'R', Input\InputOption::VALUE_NONE, 'Do not replace the destination file if it is exists', null)->
            addOption('not-check-time', 'T', Input\InputOption::VALUE_NONE, 'Compile file if the destination is newer that the source', null);
    }

    protected function execute(Input\InputInterface $input, Output\OutputInterface $output) {
        $io = new Style\SymfonyStyle($input, $output);

        $projectDir = $input->getArgument('project-dir');
        if (!$projectDir) {
            $projectDir = getcwd();
        } else {
            $projectDir = rtrim($projectDir, '/');
        }
        $projectDir .= '/';

        if (!file_exists($projectDir)) {
            $io->error('Project directory is not exists');
            return;
        }

        if (!is_dir($projectDir)) {
            $io->error('Project directory is not directory');
            $io->note('For single file compiling use "compile" command');
            return;
        }

        // TODO Config file reading

        $finder = new Finder();
        $finder->
            files()->
            in($projectDir)->
            name('*.php');

        $force = !$input->getOption('not-replace');
        $checkTime = !$input->getOption('not-check-time');

        $compiler = new Compiler();
        $printer = new PrettyPrinter\Standard(['shortArraySyntax' => true]);
        foreach ($finder as $file) {
            $this->compileFile($file, $compiler, $io, $printer, $force, $checkTime);
        }
    }
}
