<?php

namespace Foo;

use Foo\Bar;
use Foo\Bar\Baz as Foo;

/**pdgl

class TestEmpty

class TestExtending extends Data_Test

enum TestEnum {
    ONE = 1, TWO, THREE
}

@abc
@aaa(test)
@aaa(test, sgxgch)
class Test {

    const A
    const A1 = 1;
    private const B
    private const B1 = 1;
    protected const C
    protected const C1 = 1;
    public const D
    public const D1 = 1;

    val A
    val A1: string
    val A2 = "Foo";
    val A3 := "Fee";
    val A4: string = "Bar";
    val A5: string := "Baz";

    var B
    var B1: string
    var B2 = "Foo";
    var B3 := "Fee";
    var B4: string = "Bar";
    var B5: string := "Baz";

    val fuckParser = (function($test = 'A') {
        echo '123';

        try {
            throw new \Exception('AAA');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return "Jopa {${'test'}}";
    })('lol');

    direct val C
    direct val C1: string
    direct val C2 = "Foo";
    direct val C3 := "Fee";
    direct val C4: string = "Bar";
    direct val C5: string := "Baz";

    direct var D
    direct var D1: string
    direct var D2 = "Foo";
    direct var D3 := "Fee";
    direct var D4: string = "Bar";
    direct var D5: string := "Baz";
}
*/
