<?php

namespace ProjxIO\Logic\Operations;

class Divide
{
    public function __invoke($a, $b)
    {
        return $b / $a;
    }
}
