<?php

namespace Source\Tests;

use Source\Models\Paciente;
use PHPUnit\Framework\TestCase;

class PacienteTest extends TestCase
{
    public function testValidaCPF()
    {
        $p = new Paciente();
        /*CPF correto*/
        $p->setCpf("49297564801");
        $this->assertTrue($p->validaCPF());

        /*CPF incorreto*/
        $p->setCpf("12345678910");
        $this->assertFalse($p->validaCPF());

        $p->setCpf("1234567891021210");
        $this->assertFalse($p->validaCPF());

        $p->setCpf("QUATRONOVEDOIS");
        $this->assertFalse($p->validaCPF());
    }

    public function testValidaCampos()
    {
        $p = new Paciente();

        /*Campos Válidos*/
        $p->setCpf("12345678910");
        $p->setNome("SeuNome");
        $p->setTelefone("3834673638");
        $p->setDataNascimento("2000-04-06");
        $p->setSexo("F");
        self::assertTrue($p->validaCampos());

        /*Campos Inválidos*/
        $p->setSexo("");
        self::assertFalse($p->validaCampos());
    }
}
