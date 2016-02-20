<?php

namespace ProjxIO\Logic\Operations;

class ShiftLeft
{
    public function __invoke($a, $b)
    {
        return $a << $b;
    }
}
