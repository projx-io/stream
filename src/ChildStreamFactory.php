<?php

namespace ProjxIO\Logic;

class ChildStreamFactory implements StreamFactory
{
    /**
     * @inheritDoc
     */
    public function makeStream(OperationFactory $operations, callable $parent, callable $callback)
    {
        return new StreamBuilder($operations, function () use ($parent, $callback) {
            return call_user_func($callback, call_user_func_array($parent, func_get_args()));
        }, $this);
    }
}
