<?php

namespace ProjxIO\Logic\Operations;

class Times
{
    public function __invoke($a, $b)
    {
        return $b * $a;
    }
}
