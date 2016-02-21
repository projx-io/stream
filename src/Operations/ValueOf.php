<?php

namespace ProjxIO\Logic\Operations;

class ValueOf
{
    public function __invoke($array, $value)
    {
        return collect($array)->contains($value);
    }
}
