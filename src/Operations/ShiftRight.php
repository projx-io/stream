<?php

namespace ProjxIO\Logic\Operations;

class ShiftRight
{
    public function __invoke($a, $b)
    {
        return $a >> $b;
    }
}
