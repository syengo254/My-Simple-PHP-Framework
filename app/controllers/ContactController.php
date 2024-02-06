<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$posts = $db->query("SELECT id, title FROM posts")->get();

$heading = "Contact Us";

include base_path('views/contact.view.php');
