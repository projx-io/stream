<?php

namespace ProjxIO\Logic\Operations;

class Subtract
{
    public function __invoke($a, $b)
    {
        return $b - $a;
    }
}
