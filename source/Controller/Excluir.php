<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Models\Connection;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\PacienteConvenio;

class Excluir
{
    private $view;
    private $paciente;
    private $paciente_convenio;
    private $conn;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../View", "php");
        $this->paciente = new Paciente();
        $this->paciente_convenio = new PacienteConvenio();
        $this->conn  = new Connection();
    }

    public function excluir($data){
        $this->paciente->setCpf($data['cpf']);
        $this->paciente_convenio->setCpf($data['cpf']);

        $this->paciente->deletePaciente($this->conn->getConn());
        $this->paciente_convenio->deletePaciente($this->conn->getConn());


        echo $this->view->render("excluir", [
            'title' => "Paciente Excluído",
            'msg' => 'Paciente Excluído com sucesso!'
        ]);
        $this->conn->closeConn();
    }
}