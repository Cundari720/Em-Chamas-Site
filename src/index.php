<?php

include 'conexao.php';

$sql = "USE EC;";
$consulta = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Em Chamas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Em Chamas</h1>
    <h2>Fazer Pedido</h2>
    <form action="adicionar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Pedido:</label>
        <input type="text" name="pedido" required><br><br>

        <button type="submit">Enviar para o Banco</button>
    </form>
</body>

</html>
