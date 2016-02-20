<?php

namespace ProjxIO\Logic\Operations;

use PHPUnit_Framework_TestCase;

class BinaryOperationsTest extends PHPUnit_Framework_TestCase
{
    public function binaryOperations()
    {
        return [
            [new MoreThan(), 'ewe', 'dog', true],
            [new MoreThan(), 'elephant', 'dog', true],
            [new MoreThan(), 'dragon', 'dog', true],
            [new MoreThan(), 99, 50, true],
            [new MoreThan(), 50, 50, false],
            [new MoreThan(), 'dog', 'dog', false],
            [new MoreThan(), 11, 50, false],
            [new MoreThan(), 'dodo', 'dog', false],
            [new MoreThan(), 'cat', 'dog', false],
            [new MoreThan(), 'cheetah', 'dog', false],

            [new AtLeast(), 'ewe', 'dog', true],
            [new AtLeast(), 'elephant', 'dog', true],
            [new AtLeast(), 'dragon', 'dog', true],
            [new AtLeast(), 99, 50, true],
            [new AtLeast(), 50, 50, true],
            [new AtLeast(), 'dog', 'dog', true],
            [new AtLeast(), 11, 50, false],
            [new AtLeast(), 'dodo', 'dog', false],
            [new AtLeast(), 'cat', 'dog', false],
            [new AtLeast(), 'cheetah', 'dog', false],

            [new EqualTo(), 'ewe', 'dog', false],
            [new EqualTo(), 'elephant', 'dog', false],
            [new EqualTo(), 'dragon', 'dog', false],
            [new EqualTo(), 99, 50, false],
            [new EqualTo(), 50, 50, true],
            [new EqualTo(), 'dog', 'dog', true],
            [new EqualTo(), 11, 50, false],
            [new EqualTo(), 'dodo', 'dog', false],
            [new EqualTo(), 'cat', 'dog', false],
            [new EqualTo(), 'cheetah', 'dog', false],

            [new AtMost(), 'ewe', 'dog', false],
            [new AtMost(), 'elephant', 'dog', false],
            [new AtMost(), 'dragon', 'dog', false],
            [new AtMost(), 99, 50, false],
            [new AtMost(), 50, 50, true],
            [new AtMost(), 'dog', 'dog', true],
            [new AtMost(), 11, 50, true],
            [new AtMost(), 'dodo', 'dog', true],
            [new AtMost(), 'cat', 'dog', true],
            [new AtMost(), 'cheetah', 'dog', true],

            [new LessThan(), 'ewe', 'dog', false],
            [new LessThan(), 'elephant', 'dog', false],
            [new LessThan(), 'dragon', 'dog', false],
            [new LessThan(), 99, 50, false],
            [new LessThan(), 50, 50, false],
            [new LessThan(), 'dog', 'dog', false],
            [new LessThan(), 11, 50, true],
            [new LessThan(), 'dodo', 'dog', true],
            [new LessThan(), 'cat', 'dog', true],
            [new LessThan(), 'cheetah', 'dog', true],

            [new Plus(), 100, 2, 102],
            [new Subtract(), 100, 2, 98],
            [new SubtractFrom(), 100, 2, -98],
            [new Times(), 4, 5, 20],
            [new Divide(), 10, 5, 2],
            [new DivideFrom(), 2, 10, 5],
        ];
    }

    /**
     * @dataProvider binaryOperations
     * @param callable $operator
     * @param mixed $a
     * @param mixed $b
     * @param boolean $expect
     */
    public function testBinaryOperators(callable $operator, $a, $b, $expect)
    {
        $this->assertEquals($expect, call_user_func($operator, $b, $a));
    }
}
