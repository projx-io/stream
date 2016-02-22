<?php

namespace ProjxIO\Logic\Operations;

class Collect
{
    public function __invoke($value)
    {
        return collect($value);
    }
}
