<?php

    include 'conexao.php';
    $sql = "INSERT INTO PEDIDOS (NOME, PEDIDO) VALUES (:nome, :pedido)";

    $nome = $_POST['nome'];
    $pedido = $_POST['pedido'];

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':pedido', $pedido);
    $stmt->execute();

    

    header('Location:index.php');


?>