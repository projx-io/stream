<?php

namespace ProjxIO\Logic;

class StreamBuilder implements Stream
{
    /**
     * @var callable
     */
    private $callbacks;
    /**
     * @var OperationFactory
     */
    private $operations;

    /**
     * @param OperationFactory $operations
     * @param array $callbacks
     */
    public function __construct(OperationFactory $operations = null, array $callbacks = [])
    {
        $this->callbacks = $callbacks;
        $this->operations = $operations ?: new OperationFactory();
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
        foreach ($this->callbacks as $callback) {
            $args = [call_user_func_array($callback, $args)];
        }

        return array_shift($args);
    }

    public function then($callback)
    {
        $callbacks = $this->callbacks;
        $callbacks[] = $callback;
        return new StreamBuilder($this->operations, $callbacks);
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
    public function mapFilter()
    {
        return $this->then($this->operations->mapFilter(func_get_args()));
    }
}
