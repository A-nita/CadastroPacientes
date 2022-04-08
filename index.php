<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
$router = new Router("http://www.localhost/CadastroPacientes");

//controller
$router->namespace("Source\Controller");

//sem grupode urls

$router->group(null);
$router->get("/", "Facade:home");
$router->get("/cadastrar", "Facade:cadastrar");
$router->get("/buscar", "Facade:buscar");
$router->get("/visualizar", "Facade:visualizar");
$router->get("/excluir", "Facade:excluir");
$router->get("/editar", "Facade:editar");

$router->dispatch();


