<?php

namespace Source\Controller;
class Facade

{
    private $view;

    public function __construct()
    {

    }

    public function home($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/home.php";
    }

    public function cadastrar($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/cadastrar.php";
    }

    public function buscar($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/buscar.php";
    }
    public function visualizar($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/visualizacao.php";
    }

    public function editar($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/editar.php";
    }

    public function excluir($data){
        $url = "http://www.localhost/CadastroPacientes";
        require __DIR__."/../View/excluir.php";
    }


}
