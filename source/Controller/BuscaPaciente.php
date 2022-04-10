<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;

class BuscaPaciente
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

    public function buscar($data){
        $nome_convenio = $this->convenio->getNome();
        echo $this->view->render("buscar", [
            'title' => "Buscar Paciente",
            'convenio' => $nome_convenio,
            'msg' => ''
        ]);
    }

    public function resultadoBusca($data){
        $msg = '';
        $cpf = $data['cpf'];

        if(!$cpf){
            $msg = 'CPF não preenchido';
            echo $this->view->render("buscar", [
                'title' => "Buscar Paciente",
                'msg' => $msg
            ]);
        }
        else{
            $msg = 'Buscando...';
            echo $this->view->render("visualizar", [
                'title' => "Paciente",
                'msg' => $msg,
                'cpf' => $cpf
            ]);
        }
    }

}