<?php

namespace ProjxIO\Logic\Operations;

class Has
{
    public function __invoke($keys, $value)
    {
        foreach ((array)$keys as $key) {
            $value = collect($value);

            if (!$value->has($key)) {
                return false;
            }

            $value = $value->get($key);
        }

        return true;
    }
}
