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
        $dados = ['title' => 'Home'];

        echo $this->view->render("home", $dados);
    }

}
