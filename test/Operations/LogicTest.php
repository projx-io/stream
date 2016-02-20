<?php

namespace ProjxIO\Logic\Operations;

use PHPUnit_Framework_TestCase;

class LogicTest extends PHPUnit_Framework_TestCase
{
    public function testCall()
    {
        $this->assertEquals(3, call_user_func(new Call(), new Plus(), 1, 2));
    }

    public function testApply()
    {
        $this->assertEquals(3, call_user_func(new Apply(), new Plus(), [1, 2]));
    }

    public function testBind0()
    {
        $this->assertEquals(3, call_user_func(new Bind(new Plus()), 1, 2));
    }

    public function testBind1()
    {
        $this->assertEquals(3, call_user_func(new Bind(new Plus(), 1), 2));
    }

    public function testBind2()
    {
        $this->assertEquals(3, call_user_func(new Bind(new Plus(), 1, 2)));
    }

    public function testBindArray0()
    {
        $this->assertEquals(3, call_user_func(new BindArray(new Plus()), 1, 2));
    }

    public function testBindArray1()
    {
        $this->assertEquals(3, call_user_func(new BindArray(new Plus(), [1]), 2));
    }

    public function testBindArray2()
    {
        $this->assertEquals(3, call_user_func(new BindArray(new Plus(), [1, 2])));
    }
}
