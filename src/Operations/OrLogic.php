<?php

namespace ProjxIO\Logic\Operations;

class OrLogic
{
    public function __invoke($a, $b)
    {
        return $a || $b;
    }
}
