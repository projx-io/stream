<?php

namespace ProjxIO\Logic\Operations;

class AtMost
{
    public function __invoke($a, $b)
    {
        return $b <= $a;
    }
}
