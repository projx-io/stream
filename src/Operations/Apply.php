<?php

namespace ProjxIO\Logic\Operations;

class Apply
{
    public function __invoke(callable $callback, array $params = [])
    {
        return call_user_func_array($callback, $params);
    }
}
