# php-datagen

## DEVELOP OF THIS PROJECT IS CURRENTLY STOPPED

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ec9d15a8f86f4390b410ef46399f4608)](https://www.codacy.com/app/ProgMiner/php-datagen?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ProgMiner/php-datagen&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/a53d266e0050a850e749/maintainability)](https://codeclimate.com/github/ProgMiner/php-datagen/maintainability)
[![Total Downloads][ico-downloads]][link-downloads]

The PHP-DataGen project is a utility - code generator of PHP classes with certain properties and is aimed at simplifying the work of PHP programmers.

The article about this project is available on Russian language at https://habr.com/post/415861/.

## Install

Via Composer

``` bash
$ composer require progminer/php-datagen
```

## Usage

The tool has both the ability to control the generation using PHP scripts and the CLI to work with the built-in parser of its own language (hereinafter - PDGL).

### CLI

```bash
# General form
./php-datagen <command>

# File compiling
./php-datagen compile <files>...

# Project building (all files compiling)
./php-datagen build [<project dir>]
```

### PDGL

All language-supported statements are provided in the file [schema.md](schema.md) at the root of the project, but without a description of what a particular operator does. The `namespace` and `use` statements works the same as in normal PHP, but the class, fields, and their modifiers are not so simple.

Of the modifiers of the class can be identified only one non-standard for PHP the `final` modifier which also has the `final!` variation. The fact is that the result of the work of PHP-DataGen - class, which must be extended by another class to work.

The `final` modifier turns the class into a ready-to-use class by removing the prefix (the default, so far, without the possibility of modification, `Data_`) and the `abstract` modifier of the resulting PHP class. The `final!` modifier which "under the hood" is referred to as "final final" is an addition to the `final` modifier (and can not be used without it) and adds to the resulting PHP class the `final` modifier.

#### Class field

The syntax of class field very little resemblance to the syntax of PHP classes properties and even more, in my opinion, resembles the syntax of class properties Kotlin.

Let's start with what is written in the file [schema.md](schema.md):
```
// Field declaration
[direct] <val/var> <Field name>[: <Type name>[, <Validator names>]][ <:/</>= [`[``]]<Default value>[`[``]]];
```

And now in order (operators are bold, substitutions are italic):

  - **direct** - modifier. If exists, allows the extending class to access properties directly (sets the `protected` access modifier instead of `private`);
  - **val** or **var** is a field declaration operator. If **val** is used, the property is not editable after setting in the constructor, if **var** is editable;
  - *Field name* - the name of the field, specified without the PHP-specific dollar sign (`$`);
  - **:** - optional colon operator to specify the field type. If not specified, the field type is considered `mixed`;
  - *Type name* - type name. It can be one of the standard PHP types (case-insensitive) or a class name. If it ends with a question sign (for example, `string?`) then the field as well can store `null` value;
  - **,** - optional comma operator allows you to specify the validator name after the type (or validator) name;
  - *Validator name* - name of validator (see next section);
  - **<=**, **:=** or **=** - default value assignment operator. In variation **<=** assigns a value when declaring a property. In variation **:=** assigns a value when the constructor is called without checking the type and calling validators. In variation **=** assigns a value when calling a constructor with type checking and calling validators;
  - **`** or **```** - see *Default value*;
  - *Default value* - the default value of the field. It can be surrounded by **\`** or **\`\`\`** operators when contains a semicolon (`;`) (except when a variation of the default value assignment operator **<=** is used). There is no difference in the use of **\`** or **\`\`\`** if the default value is not contains a reverse apostrophe (\`), in which case you must use the **\`\`\`** operator.

### Validators

*Coming soon...*

### Examples

PDGL | PHP
---- | ---
[app/Type.pdata](app/Type.pdata) | [app/Data_Type.php](app/Data_Type.php)
[app/Model/FieldModel.pdata](app/Model/FieldModel.pdata) | [app/Model/FieldModel.php](app/Model/FieldModel.php)
[tests/Test.pdata](tests/Test.pdata) | [tests/Data_Test.php](tests/Data_Test.php)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email eridan200@mail.ru instead of using the issue tracker.

## Credits

- [Eridan Domoratskiy][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/progminer/php-datagen.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ProgMiner/php-datagen/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/progminer/php-datagen.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/progminer/php-datagen
[link-travis]: https://travis-ci.org/ProgMiner/php-datagen
[link-downloads]: https://packagist.org/packages/progminer/php-datagen
[link-author]: https://github.com/ProgMiner
[link-contributors]: ../../contributors
