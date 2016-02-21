<?php

namespace ProjxIO\Logic;

use PHPUnit_Framework_TestCase;
use ProjxIO\Logic\Operations\Bind;
use ProjxIO\Logic\Operations\Pass;
use ProjxIO\Logic\Operations\Plus;

class StreamBuilderTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertTrue(stream()->equalTo(5)->equalTo(true)->call(5));
    }

    public function testA()
    {
        $this->assertTrue(stream()->equalTo(6)->equalTo(false)->call(5));
    }

    public function testMap()
    {
        $expect = [false, true, false];
        $actual = stream()
            ->map(stream()->equalTo(4))
            ->call(collect([3, 4, 5])->items());
        $this->assertEquals($expect, $actual);
    }

    public function testFilter()
    {
        $expect = [false, 2 => false];
        $actual = stream()
            ->map(stream()->equalTo(4))
            ->filter(stream()->equalTo(false))
            ->call(collect([3, 4, 5])->items());
        $this->assertEquals($expect, $actual);
    }

    public function testMapFilter()
    {
        $expect = [3, 2 => 5];
        $actual = stream()
            ->mapFilter(stream()->equalTo(4), stream()->equalTo(false))
            ->call(collect([3, 4, 5])->items());
        $this->assertEquals($expect, $actual);
    }

    public function testHas()
    {
        $expect = [['a' => ['b' => ['c' => 'd']]]];
        $actual = stream()
            ->mapFilter(stream()->get('a'), stream()->has(['b', 'c']))
            ->call(collect([['a' => ['b' => ['c' => 'd']]], ['a' => []]])->items());
        $this->assertEquals($expect, $actual);
    }

    public function testPutIn()
    {
        $expect = ['d', 'a', 'b', 'c'];
        $array = ['d'];
        stream()->map(stream()->putIn($array, stream()->key()))->call(['a', 'b', 'c']);
        $this->assertEquals($expect, $array);
    }

    public function testPutIn2()
    {
        $expect = ['d', 'a' => 'a', 'b' => 'b', 'c' => 'c'];
        $array = ['d'];
        stream()->map(stream()->putIn($array, stream()->value()))->call(['a', 'b', 'c']);
        $this->assertEquals($expect, $array);
    }

    public function testAddTo()
    {
        $expect = ['d', 'a', 'b', 'c'];
        $array = ['d'];
        stream()->map(stream()->addTo($array))->call(['a', 'b', 'c']);
        $this->assertEquals($expect, $array);
    }

    public function testAddTo2()
    {
        $expect = ['d' => 'd', 'a', 'b', 'c'];
        $array = ['d' => 'd'];
        stream()->map(stream()->addTo($array))->call(['a', 'b', 'c']);
        $this->assertEquals($expect, $array);
    }
}
