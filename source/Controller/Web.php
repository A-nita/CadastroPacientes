<?php

namespace Source\Controller;
use League\Plates\Engine;

class Web

{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../View", "php");
    }

    public function home($data){
        $url = "http://www.localhost/CadastroPacientes";
//        require __DIR__."\..\View/home.php";

        $dados = ['title' => 'Anita',
            'nome' => 'Joaquim da silva',
            'cpf' => '49297564801'];

        echo $this->view->render("home", $dados);
    }

//    public function cadastrar($data){
//        $url = "http://www.localhost/CadastroPacientes";
////        require __DIR__."/../View/view_cadastro.php";
//
//        $dados = ['title' => 'Grupo 10',
//            'nome' => 'Joaquim da silva',
//            'cpf' => '49297564801'];
//
//        echo $this->view->render("cadastrar", $dados);
//    }

    public function buscar($data){
        $url = "http://www.localhost/CadastroPacientes";
        $dados = ['title' => 'Anita',
            'nome' => 'Joaquim da silva',
            'cpf' => '49297564801'];
//        require __DIR__."/../View/buscar.php";
        echo $this->view->render("buscar", $dados);
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
