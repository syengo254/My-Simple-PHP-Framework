<?php
$controllers_base = 'app/controllers/';

$router->get('/', $controllers_base . "HomeController.php")->only("david");
$router->get('/about', $controllers_base . "AboutController.php");
$router->get('/contact', $controllers_base . "ContactController.php")->only("guest");
