<?php

namespace ProjxIO\Logic\Operations;

class Access
{
    public function __invoke($key, $value)
    {
        return $value[$key];
    }
}