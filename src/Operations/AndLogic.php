<?php

namespace ProjxIO\Logic\Operations;

class AndLogic
{
    public function __invoke($a, $b)
    {
        return $a && $b;
    }
}
