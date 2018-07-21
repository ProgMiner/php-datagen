## Path from source code to compiled code

```
Code
|
+ PHP parser [PHP-Parser]
|
PHP AST
|
+ PHPWalker [PHP-DataGen]
|
PDGL code
|
+ PDGL parser [PHP-DataGen]
|
PDG classes
|
+ Compiler [PHP-DataGen]
|
PHP AST
|
+ Pretty printer [PHP-Parser]
|
Code
```
