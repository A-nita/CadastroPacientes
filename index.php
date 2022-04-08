<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
$router = new Router("http://www.localhost/CadastroPacientes");

//controller
$router->namespace("Source\Controller");

//sem grupode urls

$router->group(null);
$router->get("/", "Facade:home");
$router->dispatch();


