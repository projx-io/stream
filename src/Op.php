<?php

namespace ProjxIO\Logic;

class Op
{
    public static $operationFactory = null;

    /**
     * @return OperationFactory
     */
    public static function operationFactory()
    {
        return self::$operationFactory = self::$operationFactory ?: new OperationFactory();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return call_user_func([self::operationFactory(), $name], $arguments);
    }
}
