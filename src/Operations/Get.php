<?php

namespace ProjxIO\Logic\Operations;

class Get
{
    public function __invoke($keys, $value)
    {
        foreach ((array)$keys as $key) {
            $value = collect($value)->get($key);
        }

        return $value;
    }
}
