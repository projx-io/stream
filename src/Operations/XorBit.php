<?php

namespace ProjxIO\Logic\Operations;

class XorGate
{
    public function __invoke($a, $b)
    {
        return $a ^ $b;
    }
}
