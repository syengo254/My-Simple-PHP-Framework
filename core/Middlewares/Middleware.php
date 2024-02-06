<?php // strict

namespace Core\Middlewares;

use Exception;

class Middleware
{
    public const MAP = [
        "guest" => Guest::class,
        "david" => David::class,
    ];

    public static function resolve(string|null $key)
    {
        if ($key === NULL) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new Exception("Unknown middleware name '{$key}'.");
        }

        (new $middleware())->handle();
    }
}
