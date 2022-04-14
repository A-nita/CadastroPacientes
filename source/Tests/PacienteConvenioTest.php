<?php

namespace Source\Tests;

use Source\Models\Connection;
use Source\Models\PacienteConvenio;
use PHPUnit\Framework\TestCase;

class PacienteConvenioTest extends TestCase
{
    public function testInserir()
    {
        /*Dados corretos*/
        $conn = new Connection();
        $conn->getConn();
        $pc = new PacienteConvenio();
        $pc->setCpf("492975648901");
        $pc->setConvenio("Unimed");
        $pc->setNConvenio("492975648901");
        $pc->setDataVencConvenio("2022-06-06");
        $msg = $pc->inserir($conn);
        self::assertEquals('Dados inseridos', $msg);

        /*Convênio vencido*/
        $pc->setDataVencConvenio("2019-06-06");
        $msg = $pc->inserir($conn);
        self::assertEquals('Convênio Vencido!', $msg);

        /*Se número do convênio vazio*/
        $pc->setNConvenio("");
        $this->assertFalse($pc->validaCampos());

        $conn->closeConn();
    }
}
