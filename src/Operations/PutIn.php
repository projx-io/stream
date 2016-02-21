<?php

namespace ProjxIO\Logic\Operations;

class PutIn
{
    public function __invoke(&$array, callable $rename, $value, $key)
    {
//        $array = array_merge($array, [call_user_func($rename, $value, $key) => $value]);
        // following line of code bugs out for some reason.
        $array[call_user_func($rename, $value, $key)] = $value;

        return $value;
    }
}
