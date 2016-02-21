<?php

namespace ProjxIO\Logic\Operations;

class GetFrom
{
    public function __invoke($value, $keys)
    {
        foreach ((array)$keys as $key) {
            $value = collect($value)->get($key);
        }

        return $value;
    }
}
