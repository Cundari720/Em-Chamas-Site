<?php
function getConexao() {
    $host     = 'mysql.railway.internal';
    $user     = 'root';
    $port     = 3306;
    $password = 'sIMgGKouMHiHuisTYHqQWOsrSXGNDYmL';
    $db       = 'railway';

    $conexao = new mysqli($host, $user, $password, $db, $port);

    if ($conexao->connect_error) {
        die('Erro na conexão: ' . $conexao->connect_error);
    }

    return $conexao;
}

$conexao = getConexao();
?>