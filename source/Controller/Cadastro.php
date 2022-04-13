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
        $msg = $this->paciente_convenio->inserir($conn);





//        else{
//            $msg = 'CPF Inválido';
//        }

        $this->connection->closeConn();
        echo $this->view->render("view_cadastro", [
            'title' => "Cadastro de Paciente",
            'convenios' => $convenio_list,
            'msg' => $msg
        ]);


    }
    public function isValid($msg):bool{
        if(!$this->paciente->validaCampos()) {
            $msg = "Preencha todos os campos obrigatórios!";
            return false;
        }
        if(!$this->paciente->validaCPF()) {
            $msg = "Cpf Inválido!";
            return false;
        }
        return true;
    }

}