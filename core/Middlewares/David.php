<?php

namespace Core\Middlewares;

class David
{

    public function handle()
    {
        if ($_SESSION["name"] !== "David") {
            abort(403);
        }
    }
}
