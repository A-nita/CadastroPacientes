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