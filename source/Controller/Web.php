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
        $dados = ['title' => 'Anita',
            'nome' => 'Joaquim da silva',
            'cpf' => '49297564801'];

        echo $this->view->render("home", $dados);
    }

}
