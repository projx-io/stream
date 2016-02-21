<?php

namespace ProjxIO\Logic;

use ProjxIO\Logic\Operations\AddTo;
use ProjxIO\Logic\Operations\AtLeast;
use ProjxIO\Logic\Operations\AtMost;
use ProjxIO\Logic\Operations\Bind;
use ProjxIO\Logic\Operations\BindArray;
use ProjxIO\Logic\Operations\EqualTo;
use ProjxIO\Logic\Operations\Filter;
use ProjxIO\Logic\Operations\Get;
use ProjxIO\Logic\Operations\GetFrom;
use ProjxIO\Logic\Operations\Has;
use ProjxIO\Logic\Operations\KeyOf;
use ProjxIO\Logic\Operations\LessThan;
use ProjxIO\Logic\Operations\Map;
use ProjxIO\Logic\Operations\MapFilter;
use ProjxIO\Logic\Operations\MoreThan;
use ProjxIO\Logic\Operations\Pass;
use ProjxIO\Logic\Operations\PutIn;
use ProjxIO\Logic\Operations\ValueOf;

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
    private $filter;

    /**
     * @var callable
     */
    private $mapFilter;

    /**
     * @var callable
     */
    private $pass;
    /**
     * @var callable
     */
    private $get;
    /**
     * @var callable
     */
    private $has;
    /**
     * @var callable
     */
    private $valueOf;
    /**
     * @var callable
     */
    private $keyOf;
    /**
     * @var callable
     */
    private $putIn;
    /**
     * @var callable
     */
    private $addTo;
    /**
     * @var callable
     */
    private $getFrom;

    /**
     * @param callable $equalTo
     * @param callable $moreThan
     * @param callable $lessThan
     * @param callable $atMost
     * @param callable $atLeast
     * @param callable $map
     * @param callable $filter
     * @param callable $mapFilter
     * @param callable $has
     * @param callable $get
     * @param callable $keyOf
     * @param callable $valueOf
     * @param callable $addTo
     * @param callable $putIn
     * @param callable $getFrom
     * @param callable $pass
     */
    public function __construct(
        callable $equalTo = null,
        callable $moreThan = null,
        callable $lessThan = null,
        callable $atMost = null,
        callable $atLeast = null,
        callable $map = null,
        callable $filter = null,
        callable $mapFilter = null,
        callable $has = null,
        callable $get = null,
        callable $keyOf = null,
        callable $valueOf = null,
        callable $addTo = null,
        callable $putIn = null,
        callable $getFrom = null,
        callable $pass = null
    ) {
        $this->equalTo = $equalTo ?: new EqualTo();
        $this->moreThan = $moreThan ?: new MoreThan();
        $this->lessThan = $lessThan ?: new LessThan();
        $this->atMost = $atMost ?: new AtMost();
        $this->atLeast = $atLeast ?: new AtLeast();
        $this->map = $map ?: new Map();
        $this->filter = $filter ?: new Filter();
        $this->mapFilter = $mapFilter ?: new MapFilter();
        $this->pass = $pass ?: new Pass();
        $this->has = $has ?: new Has();
        $this->get = $get ?: new Get();
        $this->valueOf = $valueOf ?: new ValueOf();
        $this->keyOf = $keyOf ?: new KeyOf();
        $this->putIn = $putIn ?: new PutIn();
        $this->addTo = $addTo ?: new AddTo();
        $this->getFrom = $getFrom ?: new GetFrom();
    }

    public function bind(callable $callback)
    {
        return $this->bindArray($callback, func_get_args());
    }

    public function bindArray(callable $callback, array $args = [])
    {
        return count($args) ? new BindArray($callback, $args) : $callback;
    }

    /**
     * @param array $params
     * @return callable
     */
    public function equalTo(array $params = [])
    {
        return $this->bindArray($this->equalTo, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function moreThan(array $params = [])
    {
        return $this->bindArray($this->moreThan, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function lessThan(array $params = [])
    {
        return $this->bindArray($this->lessThan, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function atMost(array $params = [])
    {
        return $this->bindArray($this->atMost, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function atLeast(array $params = [])
    {
        return $this->bindArray($this->atLeast, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function pass(array $params = [])
    {
        return $this->bindArray($this->pass, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function map(array $params = [])
    {
        return $this->bindArray($this->map, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function filter(array $params = [])
    {
        return $this->bindArray($this->filter, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function mapFilter(array $params = [])
    {
        return $this->bindArray($this->mapFilter, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function has(array $params = [])
    {
        return $this->bindArray($this->has, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function get(array $params = [])
    {
        return $this->bindArray($this->get, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function valueOf(array $params = [])
    {
        return $this->bindArray($this->valueOf, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function keyOf(array $params = [])
    {
        return $this->bindArray($this->keyOf, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function putIn(array $params = [])
    {
        return $this->bindArray($this->putIn, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function addTo(array $params = [])
    {
        return $this->bindArray($this->addTo, $params);
    }

    /**
     * @param array $params
     * @return callable
     */
    public function getFrom(array $params = [])
    {
        return $this->bindArray($this->getFrom, $params);
    }
}
