<?php

namespace ProjxIO\Logic;

use PHPUnit_Framework_TestCase;
use ProjxIO\Logic\Operations\Bind;
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

    public function testMapFilter2()
    {
        $stream = stream();

        for ($i = 0; $i < 4000; $i++)  {
            $stream = $stream->map(new Bind(new Plus(), 1));
        }

        var_dump($stream->call(collect([3, 4, 5])->items()));

//        $this->assertEquals([2 => 5], $stream->call(collect([3, 4, 5])->items()));
//        $this->assertEquals([1 => 5], $stream->apply([collect([3, 5, 4])->items()]));
    }
}
