<?php

namespace ProjxIO\Logic\Operations;

class OrBit
{
    public function __invoke($a, $b)
    {
        return $a | $b;
    }
}
