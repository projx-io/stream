<?php

namespace ProjxIO\Logic\Operations;

class Call
{
    public function __invoke(callable $callback)
    {
        return call_user_func_array($callback, array_slice(func_get_args(), 1));
    }
}
