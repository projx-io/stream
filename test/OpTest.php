<?php

namespace ProjxIO\Logic;

use PHPUnit_Framework_TestCase;

class OpTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        $op = 'ProjxIO\Logic\Op::';

        return [
            [$op . 'equalTo', 10, 20, false],
            [$op . 'equalTo', 20, 20, true],
            [$op . 'equalTo', 30, 20, false],

            [$op . 'lessThan', 10, 20, false],
            [$op . 'lessThan', 20, 20, false],
            [$op . 'lessThan', 30, 20, true],

            [$op . 'moreThan', 10, 20, true],
            [$op . 'moreThan', 20, 20, false],
            [$op . 'moreThan', 30, 20, false],

            [$op . 'atMost', 10, 20, false],
            [$op . 'atMost', 20, 20, true],
            [$op . 'atMost', 30, 20, true],

            [$op . 'atLeast', 10, 20, true],
            [$op . 'atLeast', 20, 20, true],
            [$op . 'atLeast', 30, 20, false],

            [$op . 'has', 0, [5], true],
            [$op . 'has', 1, [5], false],
            [$op . 'has', [0], [5], true],
            [$op . 'has', [1], [5], false],
            [$op . 'has', [0, 0], [[5, 6]], true],
            [$op . 'has', [2, 0], [[5, 6]], false],
            [$op . 'has', [0, 2, 0], [[5, 6, [7]]], true],
            [$op . 'has', [0, 2, 0], [[5, 6, (object)[7]]], true],
            [$op . 'has', [0, 2, 'a'], [[5, 6, (object)['a' => 7]]], true],
            [$op . 'has', [0, 2, 'b'], [[5, 6, (object)['a' => 7]]], false],

            [$op . 'get', 0, [5], 5],
            [$op . 'get', [0], [5], 5],
            [$op . 'get', [0, 0], [[5, 6]], 5],
            [$op . 'get', [0, 2, 0], [[5, 6, [7]]], 7],
            [$op . 'get', [0, 2, 0], [[5, 6, (object)[7]]], 7],
            [$op . 'get', [0, 2, 'a'], [[5, 6, (object)['a' => 7]]], 7],

            [$op . 'valueOf', ['a', 'b', 'c'], 'c', true],
            [$op . 'valueOf', ['a', 'b', 'c'], 'd', false],

            [$op . 'keyOf', ['a', 'b', 'c'], 0, true],
            [$op . 'keyOf', ['a', 'b', 'c'], 4, false],

            [$op . 'getFrom', ['a', 'b', 'c'], 1, 'b'],
            [$op . 'getFrom', ['a', 'b', 'c'], 2, 'c'],

            [$op . 'pass', 2, null, 2],
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
