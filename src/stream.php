<?php

use ProjxIO\Logic\Stream;
use ProjxIO\Logic\StreamBuilder;

if (!function_exists('stream')) {
    /**
     * @return Stream
     */
    function stream()
    {
        static $stream = null;

        return $stream = $stream ?: new StreamBuilder();
    }
}
