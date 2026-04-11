<?php
namespace App;

class Validador {
    public static function validarPedido($nome, $pedido) {
        // Retorna falso se o nome ou o pedido estiverem em branco
        if (empty(trim($nome)) || empty(trim($pedido))) {
            return false;
        }
        return true;
    }
}
?>