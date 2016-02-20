<?php

namespace ProjxIO\Logic\Operations;

class NotBit
{
    public function __invoke($a)
    {
        return ~ $a;
    }
}
