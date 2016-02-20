<?php

namespace ProjxIO\Logic\Operations;

class Filter
{
    public function __invoke(callable $callback, array $array = [])
    {
        $list = [];

        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                $list[$key] = $value;
            }
        }

        return $list;
    }
}
