<?php

namespace ProjxIO\Logic\Operations;

class MapFilter
{
    public function __invoke(callable $map, callable $filter, array $array = [])
    {
        $list = [];

        foreach ($array as $key => $value) {
            if (call_user_func($filter, call_user_func($map, $value, $key), $key)) {
                $list[$key] = $value;
            }
        }

        return $list;
    }
}
