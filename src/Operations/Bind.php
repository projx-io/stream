<?php

namespace ProjxIO\Logic\Operations;

class Bind extends BindArray
{
    public function __construct(callable $callback)
    {
        parent::__construct($callback, array_slice(func_get_args(), 1));
    }
}
