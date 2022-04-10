<?php
require __DIR__ . "/vendor/autoload.php";
require_once(__DIR__."./source/Config.php");

use CoffeeCode\Router\Router;
$router = new Router("http://localhost/CadastroPacientes");

//controller
$router->namespace("Source\Controller");

//sem grupode urls
//quando for acessado algum desse caminho usaremos as funções  do controller Web
$router->group(null);
$router->get("/", "Web:home");

//Cadastrar paciente
$router->group("/cadastro");
$router->get("/", "Cadastro:cadastro");
$router->post("/", "Cadastro:cadastrar");

//Buscar paciente
$router->group("/buscar");
$router->get("/", "BuscaPaciente:buscar");
$router->post("/", "BuscaPaciente:resultadoBusca");

//Visualizar paciente
$router->group("/visualizar");
$router->get("/", "BuscaPaciente:buscar");
$router->post("/", "BuscaPaciente:resultadoBusca");

//$router->get("/visualizar", "Web:visualizar");
//$router->get("/excluir", "Web:excluir");
//$router->get("/editar", "Web:editar");

$router->dispatch();


