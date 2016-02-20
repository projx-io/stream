<?php

namespace ProjxIO\Logic\Operations;

class Pass
{
    public function __invoke($value)
    {
        return $value;
    }
}