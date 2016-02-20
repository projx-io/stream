<?php

namespace ProjxIO\Logic;

class StreamBuilder implements Stream
{
    /**
     * @var callable
     */
    private $callback;
    /**
     * @var OperationFactory
     */
    private $operations;
    /**
     * @var StreamFactory
     */
    private $factory;

    /**
     * @param OperationFactory $operations
     * @param callable $callback
     * @param StreamFactory $factory
     */
    public function __construct(OperationFactory $operations = null, callable $callback = null, StreamFactory $factory = null)
    {
        $this->callback = $callback;
        $this->operations = $operations ?: new OperationFactory();
        $this->factory = $factory ?: new ParentStreamFactory();
    }

    public function __invoke()
    {
        return $this->apply(func_get_args());
    }

    /**
     * @inheritDoc
     */
    public function call()
    {
        return $this->apply(func_get_args());
    }

    /**
     * @inheritDoc
     */
    public function apply(array $args = [])
    {
        return call_user_func_array($this->callback, $args);
    }

    public function then($callback)
    {
        return $this->factory->makeStream($this->operations, $this, $callback);
    }

    /**
     * @inheritdoc
     */
    public function equalTo()
    {
        return $this->then($this->operations->equalTo(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function map()
    {
        return $this->then($this->operations->map(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function filter()
    {
        return $this->then($this->operations->filter(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function filter()
    {
        return $this->then($this->operations->filter(func_get_args()));
    }
}
