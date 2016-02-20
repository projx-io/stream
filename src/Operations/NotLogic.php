<?php

namespace ProjxIO\Logic\Operations;

class NotLogic
{
    public function __invoke($a)
    {
        return !$a;
    }
}
