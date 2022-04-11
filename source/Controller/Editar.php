<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Connection;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;

class Editar
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
        $this->conn = new Connection();
    }

    public function getEditar($data){
        $this->paciente->setCpf($data['cpf']);
        $this->paciente_convenio->setCpf($data['cpf']);

        $this->paciente->retrievePaciente($this->conn->getConn());
        $this->paciente_convenio->buscar($this->conn->getConn());


        echo $this->view->render("editar", [
            'title' => "Editar Paciente",
            'convenio' => $this->paciente_convenio,
            'paciente' => $this->paciente,
            'msg' => 'GET'
        ]);
        $this->conn->closeConn();
    }

    public function postEditar($data){
        $conn = $this->conn->getConn();
        $convenio_list = $this->convenio->listConvenio($conn);
        $this->paciente->setCpf($data['cpf']);
        $this->paciente_convenio->setCpf($data['cpf']);

        $this->paciente->retrievePaciente($this->conn->getConn());
        $this->paciente_convenio->buscar($this->conn->getConn());


        echo $this->view->render("editar", [
            'title' => "Editar Paciente",
            'convenio' => $convenio_list,
            'paciente_convenio' => $this->paciente_convenio,
            'paciente' => $this->paciente,
            'msg' => 'POST'
        ]);
        $this->conn->closeConn();
    }
}