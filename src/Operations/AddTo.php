<?php

namespace ProjxIO\Logic\Operations;

class AddTo
{
    public function __invoke(&$array, $value)
    {
        $array[] = $value;

        return $value;
    }
}
