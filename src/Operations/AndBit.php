<?php

namespace ProjxIO\Logic\Operations;

class AndBit
{
    public function __invoke($a, $b)
    {
        return $a & $b;
    }
}
