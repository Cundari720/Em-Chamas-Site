<?php
function getConexao() {
    $host     = $_ENV['MYSQLHOST']     ?? getenv('MYSQLHOST')     ?? 'localhost';
    $user     = $_ENV['MYSQLUSER']     ?? getenv('MYSQLUSER')     ?? 'root';
    $port     = (int)($_ENV['MYSQLPORT']     ?? getenv('MYSQLPORT')     ?? 3306);
    $password = $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD') ?? '2308';
    $db       = $_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE') ?? 'EC';

    // Debug temporário — remover depois
    error_log("Conectando em: host=$host db=$db port=$port user=$user");

    $conexao = new mysqli($host, $user, $password, $db, $port);

    if ($conexao->connect_error) {
        die('Erro na conexão: ' . $conexao->connect_error);
    }

    return $conexao;
}

$conexao = getConexao();
?>