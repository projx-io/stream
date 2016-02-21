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
}
