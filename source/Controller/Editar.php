<?php

namespace Source\Controller;

use League\Plates\Engine;
use PhpParser\Error;
use PHPUnit\Util\Exception;
use Source\Models\Connection;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;

class Editar
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

    public function postEditar($data){
        //buscamos as lista de convênios no BD
        $convenio_list = $this->convenio->listar($this->conn);

        //buscamos o paciente e o as info do paciente convenio do BD
        $this->paciente->setCpf($data['cpf']);
        $this->paciente_convenio->setCpf($data['cpf']);
        $this->paciente->buscar($this->conn);
        $this->paciente_convenio->buscar($this->conn);

        //renderizamos o HTML com as informações
        echo $this->view->render("editar", [
            'title' => "Editar Paciente",
            'convenio' => $convenio_list,
            'paciente_convenio' => $this->paciente_convenio,
            'paciente' => $this->paciente,
            'msg' => ''
        ]);
    }

    public function EditarBD($data){
        $msg = '';
        //recebendo os dados do forms
        $this->setAtributes($data);
        $this->preenchePaciente();
        $this->preenchePacienteConvenio();
        $this->paciente->atualizar($this->conn);

        //paciente sem convenio
        if(!$this->paciente_convenio->buscar($this->conn)) {
            $this->preenchePacienteConvenio();
            //Cadastrar cpnvenio
            if(strlen($this->paciente_convenio->getConvenio())> 0) {
                $msg = $this->paciente_convenio->inserir($this->conn);
            }
        }
        // com convenio ja cadastrado
        else{
            $msg = 'Paciente convenio encontrado';
            //atualizar convenio
            if(strlen($this->nome_convenio)) {
                $this->preenchePacienteConvenio();
                $msg = 'Atualizar Convenio';
                $this->paciente_convenio->atualizar($this->conn);
            }
            //excluir o convenio
            else{
                $this->paciente_convenio->deletar($this->conn);
                $msg = 'Apagar Convenio';
            }
        }

        echo $this->view->render("view_sucesso", [
            'title' => "Editar Paciente",
            'msg' => $msg,
        ]);
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

    private function setAtributes($data):void {
        //Paciente
        $this->nome = $data['nome'];
        $this->cpf = $data['cpf'];
        $this->nome_social = $data['nome_social'];
        $this->telefone = $data['celular'];
        $this->data_nascimento = $data['data_nascimento'];
        $this->sexo = $data['sexo'];

        //Convenio do Paciente

        $this->nome_convenio = $data["Convenio"];
        $this->n_convenio = $data["n_convenio"];
        $this->validade_convenio = $data["val_convenio"];
    }
}