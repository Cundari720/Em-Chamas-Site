<?php
function getConexao() {
    $host     = $_ENV['MYSQLHOST']     ?? 'localhost';
    $user     = $_ENV['MYSQLUSER']     ?? 'root';
    $port     = (int)($_ENV['MYSQLPORT'] ?? 3306);
    $password = $_ENV['MYSQLPASSWORD'] ?? '2308';
    $db       = $_ENV['MYSQLDATABASE'] ?? 'EC';

    $conexao = new mysqli($host, $user, $password, $db, $port);

    if ($conexao->connect_error) {
        die('Erro na conexão: ' . $conexao->connect_error);
    }

    return $conexao;
}

$conexao = getConexao();
?>