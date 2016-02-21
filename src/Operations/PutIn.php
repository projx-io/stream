<?php

namespace ProjxIO\Logic\Operations;

class PutIn
{
    public function __invoke(&$array, callable $rename, $value, $key)
    {
        $array[call_user_func($rename, $value, $key)] = $value;

        return $value;
    }
}
