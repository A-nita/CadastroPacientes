<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Connection;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;
use Source\Models\Convenio;



class Cadastro
{
    private $view;
    private $paciente;
    private $paciente_convenio;
    private $convenio;
    private $conn;

    /*campos do form de cadastro*/
    /*paciente*/
    private $cpf;
    private $nome;
    private $nome_social;
    private $data_nascimento;
    private $sexo;
    private $telefone;
    /*convenio*/
    private $nome_convenio;
    private $n_convenio;
    private $validade_convenio;




    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../View", "php");
        $this->paciente = new Paciente();
        $this->paciente_convenio = new PacienteConvenio();
        $this->convenio = new Convenio();
        $this->connection = new Connection();
    }

    public function cadastro($data){
        $conn = $this->connection->getConn();
        $convenio_list = $this->convenio->listConvenio($conn);
        $this->connection->closeConn();
        echo $this->view->render("view_cadastro", [
            'title' => "Cadastro de Paciente",
            'convenios' => $convenio_list,
            'msg' => ''
        ]);
    }

    public function cadastrar($data){
        $conn = $this->connection->getConn();
        $convenio_list = $this->convenio->listConvenio($conn);
        $this->connection->closeConn();

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


        echo $this->view->render("view_cadastro", [
            'title' => "Cadastro de Paciente",
            'convenios' => [$convenio_list],
            'msg' => $msg
        ]);
    }
}