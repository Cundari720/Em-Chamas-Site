<?php
function getConexao() {
    $host     = $_SERVER['MYSQLHOST']     ?? $_ENV['MYSQLHOST']     ?? getenv('MYSQLHOST');
    $user     = $_SERVER['MYSQLUSER']     ?? $_ENV['MYSQLUSER']     ?? getenv('MYSQLUSER');
    $port     = (int)($_SERVER['MYSQLPORT'] ?? $_ENV['MYSQLPORT']   ?? getenv('MYSQLPORT') ?? 3306);
    $password = $_SERVER['MYSQLPASSWORD'] ?? $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD');
    $db       = $_SERVER['MYSQLDATABASE'] ?? $_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE');

    $conexao = new mysqli($host, $user, $password, $db, $port);

    if ($conexao->connect_error) {
        die('Erro na conexão: ' . $conexao->connect_error);
    }

    return $conexao;
}

$conexao = getConexao();
?>