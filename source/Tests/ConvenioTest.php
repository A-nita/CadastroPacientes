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
        $list = $c->listConvenio($conn->getConn());
        foreach ($list as $conv){
            echo $conv;
        }
        $conn->closeConn();
        $this->assertEquals(['nao_eh_a_unimed','Unimed'], $list);
    }
}
