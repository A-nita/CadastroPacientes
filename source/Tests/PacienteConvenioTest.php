<?php

namespace Source\Tests;

use Source\Models\Connection;
use Source\Models\PacienteConvenio;
use PHPUnit\Framework\TestCase;

class PacienteConvenioTest extends TestCase
{
    public function testInserir()
    {
        $conn = new Connection();
        $conn->getConn();
        $pc = new PacienteConvenio();
        $pc->setCpf("492975648901");
        $pc->setConvenio("Unimed");
        $pc->setNConvenio("492975648901");
        $pc->setDataVencConvenio("2022-06-06");
        $msg = $pc->inserir($conn);
        $conn->closeConn();
        self::assertEquals('Dados inseridos', $msg);
    }
}
