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

    public function EditarBD($data){

        $msg = '';
        $this->nome = $data['nome'];
        $this->cpf = $data['cpf'];
        $this->nome_social = $data['nome_social'];
        $this->telefone = $data['celular'];
        $this->data_nascimento = $data['data_nascimento'];
        $this->sexo = $data['sexo'];



        $this->nome_convenio = $data["Convenio"];
        $this->n_convenio = $data["n_convenio"];
        $this->validade_convenio = $data["val_convenio"];

        $this->paciente->setNome($this->nome);
        $this->paciente->setCpf($this->cpf);
        $this->paciente->setNomeSocial($this->nome_social);
        $this->paciente->setTelefone($this->telefone);
        $this->paciente->setDataNascimento($this->data_nascimento);
        $this->paciente->setSexo($this->sexo);

        $this->paciente_convenio->setCpf($this->cpf);
        $this->paciente_convenio->setConvenio($this->nome_convenio);
        $this->paciente_convenio->setNConvenio($this->n_convenio);
        $this->paciente_convenio->setDataVencConvenio($this->validade_convenio);


        $this->paciente->updatePaciente($this->conn->getConn());
        $msg = $this->paciente_convenio->atualizar($this->conn->getConn());


        echo $this->view->render("view_sucesso", [
            'title' => "Editar Paciente",
            'msg' => $msg
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
            'msg' => ''
        ]);
        $this->conn->closeConn();
    }
}