<?php

namespace Source\Tests;

use Source\Models\Connection;
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

    public function testValidaDataNascimento()
    {
        $p = new Paciente();

        /*Data correta*/
        $p->setDataNascimento("2000-01-27");
        $this->assertTrue($p->validaDataNascimento());

        /*Data incorreta*/
        $p->setDataNascimento("27-01-2000");
        $this->assertFalse($p->validaDataNascimento());

        /*Data incorreta*/
        $p->setDataNascimento("27-jan-2000");
        $this->assertFalse($p->validaDataNascimento());
    }

    public function testValidaTelefone()
    {
        $p = new Paciente();

        /*Data correta*/
        $p->setTelefone("11968520023");
        $this->assertTrue($p->validaTelefone());

        /*Data incorreta*/
        $p->setTelefone("68520023");
        $this->assertFalse($p->validaTelefone());

        /*Data incorreta*/
        $p->setTelefone("");
        $this->assertFalse($p->validaTelefone());
    }

}
