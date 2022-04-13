<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Connection;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;

class BuscaPaciente
{
    private $view;
    private $paciente;
    private $paciente_convenio;
    private $convenio;
    private $conn;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../View", "php");
        $this->paciente = new Paciente();
        $this->paciente_convenio = new PacienteConvenio();
        $this->convenio = new Convenio();
        $this->conn = Connection::getInstance();
    }

    public function buscar($data){
        echo $this->view->render("buscar", [
            'title' => "Buscar Paciente",
            'msg' => ''
        ]);
    }

    public function resultadoBusca($data){
        $msg = '';
        $cpf = $data['cpf'];

        if(!$cpf){
            $msg = 'CPF não preenchido';
            echo $this->view->render("buscar", [
                'title' => "Resultado Busca",
                'msg' => $msg
            ]);
        }
        else{
            $this->paciente->setCpf($cpf);
            $this->paciente_convenio->setCpf($cpf);
//            if(!$this->paciente->validaCPF()){
//                $msg = "Cpf Inválido";
//            }

            if(!$this->paciente->buscar($this->conn)) {
                $msg = 'CPF não encontrado';
                echo $this->view->render("buscar", [
                    'title' => "Buscar Paciente",
                    'msg' => $msg
                ]);
                return;
            }
            $this->paciente_convenio->buscar($this->conn);




            echo $this->view->render("visualizar", [
                'title' => "Resultado Busca",
                'msg' => $msg,
                'paciente' => $this->paciente,
                'paciente_convenio' =>$this->paciente_convenio
            ]);
        }
    }

}