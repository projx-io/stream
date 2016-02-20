<?php

namespace ProjxIO\Logic\Operations;

class SubtractFrom
{
    public function __invoke($a, $b)
    {
        return $a - $b;
    }
}
