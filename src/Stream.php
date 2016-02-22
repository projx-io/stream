<?php

namespace ProjxIO\Logic;

interface Stream
{
    /**
     * @return mixed
     */
    public function apply(array $args = []);

    /**
     * @param null $param
     * @return mixed
     */
    public function call($param = null);

    /**
     * @param $a
     * @param $b
     * @return Stream
     */
    public function equalTo($a = null, $b = null);

    /**
     * @param callable $callback
     * @return Stream
     */
    public function map(callable $callback = null);

    /**
     * @param callable $callback
     * @return Stream
     */
    public function filter(callable $callback = null);

    /**
     * @param callable $map
     * @param callable $filter
     * @return Stream
     */
    public function mapFilter(callable $map = null, callable $filter = null);

    /**
     * @param null $key
     * @param null $value
     * @return mixed
     */
    public function has($key = null, $value = null);

    /**
     * @param null $key
     * @param null $value
     * @return mixed
     */
    public function get($key = null, $value = null);

    /**
     * @param $array
     * @param $value
     * @return callable
     */
    public function valueOf($array = null, $value = null);

    /**
     * @param $array
     * @param $value
     * @return callable
     */
    public function keyOf($array = null, $value = null);

    /**
     * @param $array
     * @param callable $rename
     * @param $value
     * @param $key
     * @return callable
     */
    public function putIn(&$array = null, callable $rename = null, $value = null, $key = null);

    /**
     * @param $array
     * @param $value
     * @return callable
     */
    public function addTo(&$array = null, $value = null);

    /**
     * @param $value
     * @param $keys
     * @return callable
     */
    public function getFrom($value = null, $keys = null);

    /**
     * @return callable
     */
    public function key();

    /**
     * @return callable
     */
    public function value();

    /**
     * @param array $collection
     * @return callable
     */
    public function collect($collection = null);
}
