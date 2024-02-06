<?php
define("START_TIME", $_SERVER["REQUEST_TIME_FLOAT"]);

session_start();

$_SESSION["name"] = "David";

$req_method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$path = parse_url($_SERVER["REQUEST_URI"])['path'];


const BASE_PATH = __DIR__ . "/../";
include BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require base_path($class . ".php");
});

// bootstrap
require base_path("bootstrap.php");

$router = new Core\Router;

require base_path("routes.php");

$router->route($path, $req_method);
