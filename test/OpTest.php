<?php

namespace ProjxIO\Logic;

use PHPUnit_Framework_TestCase;

class OpTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        $logic = 'ProjxIO\Logic\Op::';

        return [
            [$logic . 'equalTo', 10, 20, false],
            [$logic . 'equalTo', 20, 20, true],
            [$logic . 'equalTo', 30, 20, false],

            [$logic . 'lessThan', 10, 20, false],
            [$logic . 'lessThan', 20, 20, false],
            [$logic . 'lessThan', 30, 20, true],

            [$logic . 'moreThan', 10, 20, true],
            [$logic . 'moreThan', 20, 20, false],
            [$logic . 'moreThan', 30, 20, false],

            [$logic . 'atMost', 10, 20, false],
            [$logic . 'atMost', 20, 20, true],
            [$logic . 'atMost', 30, 20, true],

            [$logic . 'atLeast', 10, 20, true],
            [$logic . 'atLeast', 20, 20, true],
            [$logic . 'atLeast', 30, 20, false],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $callback
     * @param $a
     * @param $b
     * @param $expect
     */
    public function testBindBoth($callback, $a, $b, $expect)
    {
        $this->assertEquals($expect, call_user_func(call_user_func($callback, $a, $b)));
    }

    /**
     * @dataProvider dataProvider
     * @param $callback
     * @param $a
     * @param $b
     * @param $expect
     */
    public function testBindA($callback, $a, $b, $expect)
    {
        $this->assertEquals($expect, call_user_func(call_user_func($callback, $a), $b));
    }

    /**
     * @dataProvider dataProvider
     * @param $callback
     * @param $a
     * @param $b
     * @param $expect
     */
    public function testBindNone($callback, $a, $b, $expect)
    {
        $this->assertEquals($expect, call_user_func(call_user_func($callback), $a, $b));
    }
}