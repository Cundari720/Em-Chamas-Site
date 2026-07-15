<?php

include 'conexao.php';

/** @var mysqli $conexao */

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$pedido = isset($_POST['pedido']) ? $_POST['pedido'] : '';

if ($nome === '' || $pedido === '') {
    header('Location:pedidos.php');
    exit;
}

$stmt = $conexao->prepare("INSERT INTO pedidos (nome, pedido) VALUES (?, ?)");
if (! $stmt) {
    die('Prepare failed: ' . $conexao->error);
}

$stmt->bind_param('ss', $nome, $pedido);
$stmt->execute();
$stmt->close();

header('Location:pedidos.php');


?>
