<?php

namespace ProjxIO\Logic\Operations;

class Select
{
    public function __invoke($a, $b, $c)
    {
        return array_key_exists($c, $a) ? $a[$c] : $b;
    }
}
