<?php

namespace ProjxIO\Logic\Operations;

class Plus
{
    public function __invoke($a, $b)
    {
        return $b + $a;
    }
}
