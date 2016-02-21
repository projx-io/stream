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
    public function call($param = null)
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

    public function then(callable $callback)
    {
        $callbacks = $this->callbacks;
        $callbacks[] = $callback;
        return new StreamBuilder($this->operations, $callbacks);
    }

    /**
     * @inheritdoc
     */
    public function equalTo($a = null, $b = null)
    {
        return $this->then($this->operations->equalTo(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function map(callable $callback = null)
    {
        return $this->then($this->operations->map(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function filter(callable $callback = null)
    {
        return $this->then($this->operations->filter(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function mapFilter(callable $map = null, callable $filter = null)
    {
        return $this->then($this->operations->mapFilter(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function has($key = null, $value = null)
    {
        return $this->then($this->operations->has(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function get($key = null, $value = null)
    {
        return $this->then($this->operations->get(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function valueOf($array, $value)
    {
        return $this->then($this->operations->valueOf(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function keyOf($array, $value)
    {
        return $this->then($this->operations->keyOf(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function putIn(&$array, callable $rename, $value, $key)
    {
        return $this->then($this->operations->putIn(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function addTo(&$array, $value)
    {
        return $this->then($this->operations->addTo(func_get_args()));
    }

    /**
     * @inheritDoc
     */
    public function getFrom($value, $keys)
    {
        return $this->then($this->operations->getFrom(func_get_args()));
    }
}
