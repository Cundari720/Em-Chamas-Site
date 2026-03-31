<?php

    $host = "127.0.0.1";
    $user = "root";
    $porta = "3306";
    $password = "2308";
    $db = "EC";


    $conexao = new PDO(
        'mysql:host='.$host.';
        port='.$porta.';
        dbname='.$db,
        $user,
        $password);


?>