<?php

namespace ProjxIO\Logic\Operations;

use PHPUnit_Framework_TestCase;

class TernaryOperationsTest extends PHPUnit_Framework_TestCase
{
    public function binaryOperations()
    {
        return [
            [new Iif(), 5, 10, true, 5],
            [new Iif(), 5, 10, false, 10],
        ];
    }

    /**
     * @dataProvider binaryOperations
     * @param callable $operator
     * @param mixed $a
     * @param mixed $b
     * @param boolean $expect
     */
    public function testTernaryOperators(callable $operator, $c, $a, $b, $expect)
    {
        $this->assertEquals($expect, call_user_func($operator, $c, $a, $b));
    }
}
