<?php

namespace ProjxIO\Logic\Operations;

class LessThan
{
    public function __invoke($a, $b)
    {
        return $b < $a;
    }
}
