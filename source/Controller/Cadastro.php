<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;
use Source\Models\Convenio;



class Cadastro
{

    private $view;
    private $paciente;
    private $paciente_convenio;
    private $convenio;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../View", "php");
        $this->paciente = new Paciente();
        $this->paciente_convenio = new PacienteConvenio();
        $this->convenio = new Convenio();
    }

    public function cadastro($data){
        $nome_convenio = $this->convenio->getNome();
        echo $this->view->render("cadastro", [
            'title' => "Cadastro de Paciente",
            'convenio' => $nome_convenio,
            'msg' => ''
        ]);
    }

    public function cadastrar($data){
        $msg = '';
        $nome = $data['nome'];
        $cpf = $data['cpf'];
        $nome_social = trim($data['nome_social']);
        $telefone = trim($data['celular']);

        if(!($nome && $cpf && $telefone)){
            $msg = 'Preencha todos os dados obrigatórios';
        }
        else{
            $msg = 'Paciente cadastrado com sucesso!';
        }


        echo $this->view->render("cadastro", [
            'title' => "Cadastro de Paciente",
            'msg' => $msg
        ]);
    }
}