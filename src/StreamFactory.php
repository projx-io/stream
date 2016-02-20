<?php

namespace ProjxIO\Logic;

interface StreamFactory
{
    /**
     * @param OperationFactory $factory
     * @param callable $parent
     * @param callable $callback
     * @return Stream
     */
    public function makeStream(OperationFactory $factory, callable $parent, callable $callback);
}
