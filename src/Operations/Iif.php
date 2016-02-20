<?php

namespace ProjxIO\Logic\Operations;

class Iif
{
    public function __invoke($a, $b, $c)
    {
        return $c ? $a : $b;
    }
}
