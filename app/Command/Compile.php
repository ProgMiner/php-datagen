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

use Symfony\Component\Console\Output;
use Symfony\Component\Console\Input;
use Symfony\Component\Console\Style;

use PhpParser\PrettyPrinterAbstract;
use PhpParser\PrettyPrinter;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor;

use PHPDataGen\Exception;
use PHPDataGen\PHPWalker;
use PHPDataGen\Compiler;
use PHPDataGen\Parsing;
use PHPDataGen\Model;

/**
 * Compile command
 */
class Compile extends Command {

    // TODO Config
    protected function compileFile(
        string $file,
        Compiler $compiler,
        Style\OutputStyle $io,
        PrettyPrinterAbstract $printer,
        bool $force = true,
        bool $checkTime = true
    ) {
        $phpParser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        $phpAST = $phpParser->parse(file_get_contents($file));

        $phpWalker = new PHPWalker();

        $phpTraverser = new NodeTraverser();
        $phpTraverser->addVisitor($phpWalker);
        $phpTraverser->traverse($phpAST);

        $pdglParser = new Parsing\Parser(
            new Parsing\Conveyor($phpWalker->getCode()),
            $phpWalker->getBuilder()
        );

        try {
            $pdglParser->parse();
        } catch (Exception\Parsing $e) {
            $io->error("Parsing error: {$e->getMessage()}");
            return;
        }

        $models = (function($builders) {
            $ret = [];

            foreach ($builders as $builder) {
                $ret[] = $builder->build();
            }

            return $ret;
        })($pdglParser->getCurrentState()->getBuilders());

        $editTime = -1;
        if ($checkTime) {
            $editTime = filemtime($file);
        }

        foreach ($models as $model) {
            $this->compileModel($model, $compiler, $io, $printer, $force, $editTime);
        }
    }

    protected function compileModel(
        Model\File $model,
        Compiler $compiler,
        Style\OutputStyle $io,
        PrettyPrinterAbstract $printer,
        bool $force = true,
        int $sourceChanged = -1
    ) {
        $io->title($model->namespace.'\\'.$model->class->name);

        $resultPath = $compiler->makePath($model);
        $resultPath[0] = './'.$resultPath[0];

        if (!file_exists($resultPath[0])) {
            mkdir($resultPath[0], 0777, true);
        }

        if (!is_dir($resultPath[0])) {
            $io->error("File {$resultPath[0]} is not directory");
            return;
        }

        $resultPath = implode('/', $resultPath);

        if (file_exists($resultPath)) {
            if (!$force) {
                $io->warning('File exists. Aborting');
                return;
            }

            if ($sourceChanged > 0) {
                if (filemtime($resultPath) > $sourceChanged) {
                    $io->text('Destination file have been changed after source. Aborting');
                    return;
                }
            }
        }

        try {
            $result = $compiler->compile($model);
        } catch (Exception\Compilation $e) {
            $io->error("Compilation error: {$e->getMessage()}");
            return;
        }

        $phpTraverser = new NodeTraverser();
        $phpTraverser->addVisitor(new NodeVisitor\NameResolver());
        $result = $phpTraverser->traverse($result);

        file_put_contents($resultPath, $printer->prettyPrintFile($result)."\n");
        $io->success("Written in $resultPath");
    }

    protected function configure() {
        $this->
            setName('compile')->
            setDescription('Compiles specified file')->
            setHelp('Compiles specified files')->

            addArgument('files', Input\InputArgument::IS_ARRAY | Input\InputArgument::REQUIRED, 'Paths to files')->

            addOption('config',      'c', Input\InputOption::VALUE_REQUIRED, 'Config file', null)->
            addOption('not-replace', 'R', Input\InputOption::VALUE_NONE,     'Do not replace the destination file if it is exists', null)->
            addOption('check-time',  't', Input\InputOption::VALUE_NONE,     'Do not compile file if the destination is newer that the source', null);
    }

    protected function execute(Input\InputInterface $input, Output\OutputInterface $output) {
        $io = new Style\SymfonyStyle($input, $output);

        $force = !$input->getOption('not-replace');
        $checkTime = $input->getOption('check-time');

        // TODO Config file reading

        $compiler = new Compiler();
        $printer = new PrettyPrinter\Standard(['shortArraySyntax' => true]);
        foreach ($input->getArgument('files') as $file) {
            if (!file_exists($file)) {
                $io->error("File \"$file\" is not exists. Skipping");
                continue;
            }

            if (!is_file($file)) {
                $io->error("File \"$file\" is not file. Skipping");
                continue;
            }

            $this->compileFile($file, $compiler, $io, $printer, $force, $checkTime);
        }
    }
}
