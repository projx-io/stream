<?php

namespace ProjxIO\Logic\Operations;

class EqualTo
{
    public function __invoke($a, $b)
    {
        return $b === $a;
    }
}
