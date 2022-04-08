<?php

namespace Source\Controller;

class Facade
{

    public function __construct()
    {
    }

    public function home($data){
        echo "<h1>Cadastro de Pacientes!</h1>";
        var_dump($data);
    }
}
