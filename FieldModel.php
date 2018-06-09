<?php

use PHPDataGen\Compiler;

use PHPDataGen\Building\FileBuilder;
use PHPDataGen\Building\ClassBuilder;
use PHPDataGen\Building\FieldBuilder;

require_once 'vendor/autoload.php';

$fileBuilder = new FileBuilder();

$fileBuilder->setNamespace('PHPDataGen\\Model');

$classBuilder = new ClassBuilder();

$classBuilder->setName('FieldModel')->

    addField(
        (new FieldBuilder())->
            setName('name')->
            setType('string')
    )->

    addField(
        (new FieldBuilder())->
            setName('editable')->
            setType('bool')->
            setDefault('false')
    )->

    addField(
        (new FieldBuilder())->
            setName('direct')->
            setType('bool')->
            setDefault('false')
    )->

    addField(
        (new FieldBuilder())->
            setName('type')->
            setType('string')
    )->

    addField(
        (new FieldBuilder())->
            setName('validators')->
            setType('array')
    )->

    addField(
        (new FieldBuilder())->
            setName('hasDefault')->
            setType('bool')->
            setDefault('false')
    )->

    addField(
        (new FieldBuilder())->
            setName('filterDefault')->
            setType('bool')->
            setDefault('true')
    )->

    addField(
        (new FieldBuilder())->
            setName('default')
    );

$fileBuilder->addClass($classBuilder);

$fileModel = $fileBuilder->build();

$compiler = new Compiler();

echo $compiler->compile($fileModel);
