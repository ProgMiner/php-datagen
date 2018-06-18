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

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Style\OutputStyle;

use PHPDataGen\Exception\ParsingException;

use PHPDataGen\Parsing\Conveyor;
use PHPDataGen\Parsing\Parser;

use PHPDataGen\Compiler;

use function PHPDataGen\Utility\_pathInfo;

/**
 * Compile command
 */
class CompileCommand extends Command {

    // TODO Config
    protected function compileFile(string $file, OutputStyle $io, Compiler $compiler = null) {
        $io->title($file);

        $pathinfo = _pathInfo($file);

        if ($pathinfo->extension !== 'pdata') {
            $io->warning("File \"$file\" extension is not \".pdata\"");
        }

        $parser = new Parser(new Conveyor(file_get_contents($file)));

        try {
            $parser->parse();
        } catch (ParsingException $e) {
            $io->error("Parsing error: {$e->getMessage()}");
            return;
        }

        if (is_null($compiler)) {
            $compiler = new Compiler();
        }

        $model = $parser->getCurrentState()->getBuilder()->build();
        if (count($model->classes) < 1) {
            $io->warning("File has no classes");
        } elseif (count($model->classes) > 1) {
            $io->warning("File has more than one class");
        } else {
            if ($pathinfo->filename !== $model->classes[0]->name) {
                $io->warning("File name is mismatch class name");
            }
        }

        $result = '';
        try {
            $result = $compiler->compile($model);
        } catch (CompilationException $e) {
            $io->error("Compilation error: \"{$e->getMessage()}\"");
            return;
        }

        $resultPath = "{$pathinfo->dirname}/Data_{$pathinfo->filename}.php";
        file_put_contents($resultPath, $result);

        $io->success("Written in $resultPath");
    }

    protected function configure() {
        $this->
            setName('compile')->
            setDescription('Compiles specified file')->
            setHelp('Compiles specified files')->

            addArgument('files', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Paths to files')->

            addOption('config', 'c', InputOption::VALUE_REQUIRED, 'Config file', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $io = new SymfonyStyle($input, $output);

        // TODO Config file reading

        var_dump($input->getArgument('files'));

        foreach ($input->getArgument('files') as $file) {
            if (!file_exists($file)) {
                $io->error("File \"$file\" is not exists. Skipping");
                continue;
            }

            if (!is_file($file)) {
                $io->error("File \"$file\" is not file. Skipping");
                continue;
            }

            $this->compileFile($file, $io);
        }
    }
}
