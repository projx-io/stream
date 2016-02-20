<?php

namespace ProjxIO\Logic;

use ProjxIO\Logic\Operations\AtLeast;
use ProjxIO\Logic\Operations\AtMost;
use ProjxIO\Logic\Operations\BindArray;
use ProjxIO\Logic\Operations\EqualTo;
use ProjxIO\Logic\Operations\LessThan;
use ProjxIO\Logic\Operations\MoreThan;

class Logic
{
    /**
     * @param callable $callback
     * @return callable
     */
    public static function bind(callable $callback)
    {
        return self::bindArray($callback, array_slice(func_get_args(), 1));
    }

    /**
     * @param callable $callback
     * @param array $params
     * @return callable
     */
    public static function bindArray(callable $callback, array $params = [])
    {
        return count($params) ? new BindArray($callback, $params) : $callback;
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return callable
     */
    public static function equalTo($a = null, $b = null)
    {
        static $callback;
        $callback = $callback ?: new EqualTo();
        return self::bindArray($callback, func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return callable
     */
    public static function lessThan($a = null, $b = null)
    {
        static $callback;
        $callback = $callback ?: new LessThan();
        return self::bindArray($callback, func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return callable
     */
    public static function moreThan($a = null, $b = null)
    {
        static $callback;
        $callback = $callback ?: new MoreThan();
        return self::bindArray($callback, func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return callable
     */
    public static function atMost($a = null, $b = null)
    {
        static $callback;
        $callback = $callback ?: new AtMost();
        return self::bindArray($callback, func_get_args());
    }

    /**
     * @param mixed $a
     * @param mixed $b
     * @return callable
     */
    public static function atLeast($a = null, $b = null)
    {
        static $callback;
        $callback = $callback ?: new AtLeast();
        return self::bindArray($callback, func_get_args());
    }
}
