<?php

namespace ProjxIO\Logic;

class ParentStreamFactory implements StreamFactory
{
    /**
     * @var StreamFactory
     */
    private $child;

    /**
     * ParentStreamFactory constructor.
     * @param StreamFactory $child
     */
    public function __construct(StreamFactory $child = null)
    {
        $this->child = $child ?: new ChildStreamFactory();
    }

    /**
     * @inheritDoc
     */
    public function makeStream(OperationFactory $operations, callable $parent, callable $callback)
    {
        return new StreamBuilder($operations, $callback, $this->child);
    }
}
