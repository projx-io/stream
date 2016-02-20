<?php

namespace ProjxIO\Logic\Operations;

class AtLeast
{
    public function __invoke($a, $b)
    {
        return $b >= $a;
    }
}
