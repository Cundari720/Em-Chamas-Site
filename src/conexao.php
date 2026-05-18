<?php
function getConexao() {
    $host     = getenv('MYSQLHOST')     ?: 'localhost';
    $user     = getenv('MYSQLUSER')     ?: 'root';
    $port     = (int)(getenv('MYSQLPORT') ?: 3306);
    $password = getenv('MYSQLPASSWORD') ?: '2308';
    $db       = getenv('MYSQLDATABASE') ?: 'EC';

    $conexao = new mysqli($host, $user, $password, $db, $port);

    if ($conexao->connect_error) {
        die('Erro na conexão: ' . $conexao->connect_error);
    }

    return $conexao;
}

$conexao = getConexao();
?>