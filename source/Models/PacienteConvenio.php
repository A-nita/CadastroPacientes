<?php

namespace Source\Models;

class PacienteConvenio
{
    private $cpf;
    private $convenio;
    private $nConvenio;
    private $data_venc_convenio;

//    public function __construct($cpf, $convenio, $nConvenio, $data_venc_convenio){
//        $this->cpf = $cpf;
//        $this->convenio = $convenio;
//        $this->nConvenio = $nConvenio;
//        $this->data_venc_convenio = $data_venc_convenio;
//    }
    public function __construct()
    {
    }


    public function isValid():string {
        if(!$this->validaCampos()) {
            return "Todos os campos do convênio são obrigatórios!";
        }
        if(!$this->validaDataVencimento()) {
            return "Convênio Vencido!";
        }
        return '';
    }

    private function validaCampos():bool {
        if(!strlen($this->nConvenio) || !strlen($this->data_venc_convenio)) {
            return false;
        }
        return true;
    }

    private function validaDataVencimento():bool {
        if($this->data_venc_convenio < date("Y-m-d")){
            return false;
        }
        return true;
    }

    public function inserir($conn){
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "INSERT INTO paciente_con (cpf_paciente, nome_convenio, vencimento_convenio, n_convenio) VALUES (".$this->getCPF().",'".$this->getConvenio()."','".$this->getDataVencConvenio()."','".$this->getNConvenio()."')";


            if(mysqli_query($conn, $sql)) {
                $msg = 'Dados inseridos';

            } else {
                $msg =  $conn->error;
            }
        }
        return $msg;
    }

    public function buscar($conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "SELECT * FROM paciente_con WHERE cpf_paciente = '".$this->cpf."'";
            $dados = $conn->query($sql);

            if ($dados->num_rows > 0) {
                // output data of each row
                while($row = $dados->fetch_assoc()) {
                    $this->setCpf($row["cpf_paciente"]);
                    $this->setConvenio($row["nome_convenio"]);
                    $this->setDataVencConvenio($row["vencimento_convenio"]);
                    $this->setNConvenio($row["n_convenio"]);

                    return $this;
                }
            } else {
                echo "Paciente não encontrado";
                return NULL;
            }
        }
    }

    public function atualizar($conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "UPDATE paciente_con SET nome_convenio = '".$this->convenio."', vencimento_convenio = '".$this->data_venc_convenio."', n_convenio = '".$this->nConvenio."'WHERE cpf_paciente ='".$this->cpf."'";

            return $conn->query($sql);
        }
    }

    public function deletar($conn):void {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else{
            $sql = "DELETE FROM paciente_con WHERE cpf_paciente = '".$this->getCpf()."'";
            $conn->query($sql);
        }
    }





    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getConvenio()
    {
        return $this->convenio;
    }

    /**
     * @param mixed $convenio
     */
    public function setConvenio($convenio): void
    {
        $this->convenio = $convenio;
    }

    /**
     * @return mixed
     */
    public function getNConvenio()
    {
        return $this->nConvenio;
    }

    /**
     * @param mixed $nConvenio
     */
    public function setNConvenio($nConvenio): void
    {
        $this->nConvenio = $nConvenio;
    }

    /**
     * @return mixed
     */
    public function getDataVencConvenio()
    {
        return $this->data_venc_convenio;
    }

    /**
     * @param mixed $data_venc_convenio
     */
    public function setDataVencConvenio($data_venc_convenio): void
    {
        $this->data_venc_convenio = $data_venc_convenio;
    }




}