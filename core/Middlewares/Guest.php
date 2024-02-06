<?php

namespace Core\Middlewares;

class Guest
{

    public function handle()
    {
        if ($_SESSION["name"] !== "Guest") {
            abort(403);
        }
    }
}
