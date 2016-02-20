<?php

namespace ProjxIO\Logic\Operations;

class XorLogic
{
    public function __invoke($a, $b)
    {
        return $a xor $b;
    }
}
