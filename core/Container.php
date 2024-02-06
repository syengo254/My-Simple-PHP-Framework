<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind(string $key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("Could not resolve binding for '{$key}' in container.");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}
