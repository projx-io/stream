<?php

namespace ProjxIO\Logic;

use ProjxIO\Logic\Operations\AtLeast;
use ProjxIO\Logic\Operations\AtMost;
use ProjxIO\Logic\Operations\BindArray;
use ProjxIO\Logic\Operations\EqualTo;
use ProjxIO\Logic\Operations\Get;
use ProjxIO\Logic\Operations\Has;
use ProjxIO\Logic\Operations\LessThan;
use ProjxIO\Logic\Operations\MoreThan;

class Op
{
    public static $operationFactory = null;

    public static function operationFactory()
    {
        return self::$operationFactory = self::$operationFactory ?: new OperationFactory();
    }

    /**
     * @param callable $callback
     * @return callable
     */
    public static function bind(callable $callback)
    {
        return self::operationFactory()->bindArray($callback, func_get_args());
    }

    /**
     * @param callable $callback
     * @param array $params
     * @return callable
     */
    public static function bindArray(callable $callback, array $params = [])
    {
        return self::operationFactory()->bindArray($callback, $params);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func([self::operationFactory(), $name], $arguments);
    }
}
