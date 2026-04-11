<?php

use PHPUnit\Framework\TestCase;
use App\Validador;

class ValidadorTest extends TestCase
{
    public function testValidarPedidoComDadosCorretos()
    {
        $this->assertTrue(Validador::validarPedido("Matheus", "Paz e saúde"));
    }

    public function testValidarPedidoComDadosVazios()
    {
        $this->assertFalse(Validador::validarPedido("", "   "));
    }
}
