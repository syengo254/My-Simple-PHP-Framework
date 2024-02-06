<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$posts = $db->query("SELECT id, title FROM posts")->get();

$heading = "Home";

include base_path('views/default_view.view.php');

echo (microtime(true) - START_TIME) * 1000;
