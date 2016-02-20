<?php

namespace ProjxIO\Logic;

interface Stream
{
    /**
     * @return Stream
     */
    public function equalTo();

    /**
     * @return Stream
     */
    public function map();
}
