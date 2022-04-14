<?php

namespace Source\Tests;

use Source\Models\Connection;
use Source\Models\Convenio;
use PHPUnit\Framework\TestCase;

class ConvenioTest extends TestCase
{
    public function testListConvenio()
    {
        $conn = new Connection();

        $c = new Convenio();
        $list = $c->listar($conn->getConn());
        foreach ($list as $conv){
            echo $conv;
        }
        $conn->closeConn();
        $this->assertEquals(['nao_eh_a_unimed','Unimed'], $list);
    }
    public function testBuscar(){
        $conn = new Connection();

        $c = new Convenio();

        /* Buscar a Unimed */
        $msg = $c->buscar("Unimed", $conn);
        $this->assertNotNull($msg);

        /* Buscar um plano de saúde que não existe. */
        $msg = $c->buscar("UFSCar", $conn);
        $this->assertNull($msg);

        $conn->closeConn();
    }
}