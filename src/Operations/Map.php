<?php

namespace ProjxIO\Logic\Operations;

class Map
{
    public function __invoke(callable $callback, array $array = [])
    {
        $list = [];

        foreach ($array as $key => $value) {
            $list[$key] = call_user_func($callback, $value, $key);
        }

        return $list;
    }
}
