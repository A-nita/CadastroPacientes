<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Connection;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;
use Source\Models\Convenio;

class Cadastro
{
    private Engine $view;
    private Paciente $paciente;
    private PacienteConvenio $paciente_convenio;
    private Convenio $convenio;
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
        $this->conn = Connection::getInstance();
    }

    public function cadastro($data){
        //buscamos as lista de convênios no BD
        $convenio_list = $this->convenio->listar($this->conn);

        echo $this->view->render("view_cadastro", [
            'title' => "Cadastro de Paciente",
            'convenios' => $convenio_list,
            'msg' => ''
        ]);
    }

    public function cadastrar($data){
        $convenio_list = $this->convenio->listar($this->conn);
        //recebendo os dados do forms
        $this->setAtributes($data);
        $this->preenchePaciente();
        $this->preenchePacienteConvenio();

        $msg = $this->validaCadastro();
        if(!strlen($msg)) {
            $this->paciente->inserir($this->conn);
            $this->paciente_convenio->inserir($this->conn);
            $msg = "Paciente Cadastrado com Sucesso";
        }
        echo $this->view->render("view_cadastro", [
            'title' => "Cadastro de Paciente",
            'convenios' => $convenio_list,
            'msg' => $msg
        ]);
    }

    private function setAtributes($data):void {
        //Paciente
        $this->nome = $data['nome'];
        $this->cpf = $data['cpf'];
        $this->nome_social = $data['nome_social'];
        $this->telefone = $data['celular'];
        $this->data_nascimento = $data['data_nascimento'];
        $this->sexo = $data['sexo'];

        //Convenio do Paciente
        if($data["Convenio"] == "Sem Convênio"){
            $this->nome_convenio = '';
        }
        else {
            $this->nome_convenio = $data["Convenio"];
        }

        $this->n_convenio = $data["n_convenio"];
        $this->validade_convenio = $data["val_convenio"];
    }

    private function preenchePaciente():void {
        $this->paciente->setNome($this->nome);
        $this->paciente->setCpf($this->cpf);
        $this->paciente->setNomeSocial($this->nome_social);
        $this->paciente->setTelefone($this->telefone);
        $this->paciente->setDataNascimento($this->data_nascimento);
        $this->paciente->setSexo($this->sexo);
    }

    private function preenchePacienteConvenio():void {
        $this->paciente_convenio->setCpf($this->cpf);
        $this->paciente_convenio->setConvenio($this->nome_convenio);
        $this->paciente_convenio->setNConvenio($this->n_convenio);
        $this->paciente_convenio->setDataVencConvenio($this->validade_convenio);
    }

    private function validaCadastro():string {

        $msg_erro = $this->paciente->isValid($this->conn);
        if(strlen($msg_erro)) {
            return $msg_erro;
        }
        if($this->paciente->buscar($this->conn)) {
            return 'Paciente já cadastrado!';
        }
        //verificamos se algum convenio foi selecionado para cadastro
        if(strlen($this->paciente_convenio->getConvenio())>0) {
            $msg_erro = $this->paciente_convenio->isValid();
            if(strlen($msg_erro)) {
                return $msg_erro;
            }
        }
        return '';
    }
}