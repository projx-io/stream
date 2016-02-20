<?php

namespace ProjxIO\Logic\Operations;

class MoreThan
{
    public function __invoke($a, $b)
    {
        return $b > $a;
    }
}
