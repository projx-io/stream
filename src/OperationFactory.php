<?php

namespace ProjxIO\Logic;

use ProjxIO\Logic\Operations\AtLeast;
use ProjxIO\Logic\Operations\AtMost;
use ProjxIO\Logic\Operations\BindArray;
use ProjxIO\Logic\Operations\EqualTo;
use ProjxIO\Logic\Operations\LessThan;
use ProjxIO\Logic\Operations\MoreThan;

class OperationFactory
{
    /**
     * @var callable
     */
    private $equalTo;

    /**
     * @var callable
     */
    private $moreThan;

    /**
     * @var callable
     */
    private $lessThan;

    /**
     * @var callable
     */
    private $atMost;

    /**
     * @var callable
     */
    private $atLeast;

    /**
     * @param callable $equalTo
     * @param callable $moreThan
     * @param callable $lessThan
     * @param callable $atMost
     * @param callable $atLeast
     */
    public function __construct(
        callable $equalTo = null,
        callable $moreThan = null,
        callable $lessThan = null,
        callable $atMost = null,
        callable $atLeast = null
    ) {
        $this->equalTo = $equalTo ?: new EqualTo();
        $this->moreThan = $moreThan ?: new MoreThan();
        $this->lessThan = $lessThan ?: new LessThan();
        $this->atMost = $atMost ?: new AtMost();
        $this->atLeast = $atLeast ?: new AtLeast();
    }

    public function bind(callable $callback, array $args = [])
    {
        return count($args) ? new BindArray($callback, $args) : $callback;
    }

    /**
     * @return callable
     */
    public function equalTo()
    {
        return $this->bind($this->equalTo, func_get_args());
    }

    /**
     * @return callable
     */
    public function moreThan()
    {
        return $this->bind($this->moreThan, func_get_args());
    }

    /**
     * @return callable
     */
    public function lessThan()
    {
        return $this->bind($this->lessThan, func_get_args());
    }

    /**
     * @return callable
     */
    public function atMost()
    {
        return $this->bind($this->atMost, func_get_args());
    }

    /**
     * @return callable
     */
    public function atLeast()
    {
        return $this->bind($this->atLeast, func_get_args());
    }
}
