<?php

namespace ProjxIO\Logic\Operations;

class KeyOf extends Has
{
    public function __invoke($value, $keys)
    {
        return parent::__invoke($keys, $value);
    }
}
