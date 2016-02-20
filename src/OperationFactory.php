<?php

namespace ProjxIO\Logic;

use ProjxIO\Logic\Operations\AtLeast;
use ProjxIO\Logic\Operations\AtMost;
use ProjxIO\Logic\Operations\BindArray;
use ProjxIO\Logic\Operations\EqualTo;
use ProjxIO\Logic\Operations\LessThan;
use ProjxIO\Logic\Operations\Map;
use ProjxIO\Logic\Operations\MoreThan;
use ProjxIO\Logic\Operations\Pass;

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
     * @var callable
     */
    private $map;

    /**
     * @var callable
     */
    private $pass;

    /**
     * @param callable $equalTo
     * @param callable $moreThan
     * @param callable $lessThan
     * @param callable $atMost
     * @param callable $atLeast
     * @param callable $map
     * @param callable $pass
     */
    public function __construct(
        callable $equalTo = null,
        callable $moreThan = null,
        callable $lessThan = null,
        callable $atMost = null,
        callable $atLeast = null,
        callable $map = null,
        callable $pass = null
    )
    {
        $this->equalTo = $equalTo ?: new EqualTo();
        $this->moreThan = $moreThan ?: new MoreThan();
        $this->lessThan = $lessThan ?: new LessThan();
        $this->atMost = $atMost ?: new AtMost();
        $this->atLeast = $atLeast ?: new AtLeast();
        $this->map = $map ?: new Map();
        $this->pass = $pass ?: new Pass();
    }

    public function bind(callable $callback, array $args = [])
    {
        return count($args) ? new BindArray($callback, $args) : $callback;
    }

    /**
     * @param array $params
     * @return callable
     */
    public function equalTo(array $params = [])
    {
        return $this->bind($this->equalTo, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function moreThan(array $params = [])
    {
        return $this->bind($this->moreThan, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function lessThan(array $params = [])
    {
        return $this->bind($this->lessThan, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function atMost(array $params = [])
    {
        return $this->bind($this->atMost, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function atLeast(array $params = [])
    {
        return $this->bind($this->atLeast, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function pass(array $params = [])
    {
        return $this->bind($this->pass, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function map(array $params = [])
    {
        return $this->bind($this->map, $params);
    }
}
