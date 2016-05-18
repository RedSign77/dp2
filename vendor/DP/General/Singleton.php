<?php

/**
 * Class Singleton
 */

namespace DP\General;

abstract class Singleton
{

    private static $map = array();

    protected function __construct()
    {
        throw new NotImplementedException('Singleton: Override me!');
    }

    public static function getInstance($args = null)
    {
        $class = get_called_class();
        if (!array_key_exists($class, self::$map)) {
            if ($args !== null) {
                self::$map[$class] = new $class($args);
            } else {
                self::$map[$class] = new $class();
            }
        }
        return self::$map[$class];
    }

}
