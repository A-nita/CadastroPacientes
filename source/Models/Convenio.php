<?php

namespace Source\Models;

class Convenio
{
    private $tipoPlano;
    private $abrangenciaAtuacao;
    private $tipoAtendimento;
    private $lista_convenios;
    //deveria ter um nome do plano né não
    private $nome;


    // public function __construct($nome, $tipoPlano, $abrangenciaAtuacao, $tipoAtendimento){
    // 	$this->nome = $nome; //diagrama
    // 	$this->tipoPlano = $tipoPlano;
    // 	$this->abrangenciaAtuacao = $abrangenciaAtuacao;
    // 	$this->tipoAtendimento = $tipoAtendimento;
    // }

    public function __construct(){
        $this->nome = ""; //diagrama
        $this->tipoPlano = "";
        $this->abrangenciaAtuacao = "";
        $this->tipoAtendimento = "";
        $this->tipoAtendimento = array();
    }



    public function insertTableConvenio($conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "INSERT INTO convenio (nome, tipo_plano, abrangencia_atuacao, tipo_atendimento) VALUES ('".$this->nome."','".$this->tipoPlano."', '".$this->abrangenciaAtuacao."', '".$this->tipoAtendimento."')";
            if(mysqli_query($conn, $sql)) {
                $msg = 'Dados inseridos';
            } else {
                $msg = $sql;
            }
        }
        return $msg;
    }

    public function listConvenio( $conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "SELECT * FROM Convenio ORDER BY nome";
            $dados = $conn->query($sql);

            $list = array();
            if ($dados->num_rows > 0) {
                // output data of each row
                while($row = $dados->fetch_assoc()) {
                    array_push($list, $row["nome"]);
                }
                return $list;
            } else {
                echo "Convênio não encontrado";
                return NULL;
            }
        }
    }

    public function retrieveTableConvenio($nome, $conn) {
        if(!$conn){
            $msg = "Falha na conexão";
        }
        else {
            $sql = "SELECT * FROM convenio";
            $dados = $conn->query($sql);

            if ($dados->num_rows > 0) {
                // output data of each row
                while($row = $dados->fetch_assoc()) {
                    $this->setNome($row["nome"]);
                    $this->setTipoPlano($row["tipo_plano"]);
                    $this->setAbrangenciaAtuacao($row["abrangencia_atuacao"]);
                    $this->setTipoAtendimento($row["tipo_atendimento"]);
                    return $this;
                }
            } else {
                echo "Convênio não encontrado";
                return NULL;
            }
        }
    }

    /**
     * @return string
     */
    public function getTipoPlano(): string
    {
        return $this->tipoPlano;
    }

    /**
     * @param string $tipoPlano
     */
    public function setTipoPlano(string $tipoPlano): void
    {
        $this->tipoPlano = $tipoPlano;
    }

    /**
     * @return string
     */
    public function getAbrangenciaAtuacao(): string
    {
        return $this->abrangenciaAtuacao;
    }

    /**
     * @param string $abrangenciaAtuacao
     */
    public function setAbrangenciaAtuacao(string $abrangenciaAtuacao): void
    {
        $this->abrangenciaAtuacao = $abrangenciaAtuacao;
    }

    /**
     * @return string
     */
    public function getTipoAtendimento(): string
    {
        return $this->tipoAtendimento;
    }

    /**
     * @param string $tipoAtendimento
     */
    public function setTipoAtendimento(string $tipoAtendimento): void
    {
        $this->tipoAtendimento = $tipoAtendimento;
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


}