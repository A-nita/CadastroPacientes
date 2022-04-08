<?php

namespace Source\Models;

class Paciente
{
    private $cpf;
    private $nome;
    private $nomeSocial;
    private $dataNascimento;
    private $sexo;
    private $telefone;

    // public function __construct($cpf, $nome, $dataNascimento, $sexo, $telefone){
    // 	$this->cpf = $cpf;
    // 	$this->nome = $nome;
    // 	$this->dataNascimento = $dataNascimento;
    // 	$this->sexo = $sexo;
    // 	$this->telefone = $telefone;
    // 	$this->nomeSocial = "";
    // }

    public function __construct(){
        $this->cpf = "";
        $this->nome = "";
        $this->dataNascimento = "";
        $this->sexo = "";
        $this->telefone = "";
        $this->nomeSocial = "";
    }




    public function insertPaciente($conn): string
    {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "INSERT INTO paciente (cpf, nome, nome_social, data_nascimento, sexo, telefone) VALUES ('".$this->getCPF()."','".$this->getNome()."', '".$this->getNomeSocial()."', '".$this->getDataNascimento()."', '".$this->getSexo()."', '".$this->getTelefone()."')";

            if(mysqli_query($conn, $sql)) {
                $msg = 'Dados inseridos';
            } else {
                $msg = $sql;
            }
        }
        return $msg;
    }

    public function retrievePaciente($cpf, $conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "SELECT * FROM paciente WHERE cpf = '".$cpf."'";
            $dados = $conn->query($sql);

            if ($dados->num_rows > 0) {
                // output data of each row
                while($row = $dados->fetch_assoc()) {
                    $this->setCpf($row["cpf"]);
                    $this->setNome($row["nome"]);
                    $this->setDataNascimento($row["data_nascimento"]);
                    $this->setSexo($row["sexo"]);
                    $this->setTelefone($row["telefone"]);
                    $this->setNomeSocial($row["nome_social"]);
                    return $this;
                }
            } else {
                echo "Paciente não encontrado";
                return NULL;
            }
        }
    }

    public function updatePaciente($conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "UPDATE paciente SET nome='".$this->nome."', telefone='".$this->telefone."', nome_social='".$this->nomeSocial."'  WHERE cpf='".$this->cpf."'";

            $up = $conn->query($sql);
        }
    }

    public function deletePaciente($conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else{
            $sql = "DELETE FROM paciente WHERE cpf = '".$this->cpf."'";
            $conn->query($sql);
        }
    }


    /*GETTERS E SETTERS */

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNomeSocial(): string
    {
        return $this->nomeSocial;
    }

    /**
     * @param string $nomeSocial
     */
    public function setNomeSocial(string $nomeSocial): void
    {
        $this->nomeSocial = $nomeSocial;
    }

    /**
     * @return string
     */
    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    /**
     * @param string $dataNascimento
     */
    public function setDataNascimento(string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }



}