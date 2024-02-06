<?php

namespace Core;

class App
{
    protected static Container $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    // get it back
    public static function container()
    {
        return static::$container;
    }

    // delegated from container class
    public static function resolve(string $key)
    {
        return static::$container->resolve($key);
    }
}
