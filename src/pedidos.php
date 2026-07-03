<?php

include 'conexao.php';

 /**
  * @var mysqli $conexao
  */
 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Em Chamas Pedidos</title>
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-pedidos">

    <div class="container">

        <header>
            <div class="logo">
                EM CHAMAS
            </div>

            <nav>
                <ul>
                    <li><a href="index.php">INÍCIO</a></li>
                    <li><a href="informacoes.php">INFOMAÇÕES</a></li>
                    <li><a href="versiculo.php">VERSÍCULO DO DIA</a></li>
                    <li><a href="pedidos.php">PEDIDOS</a></li>
                </ul>
            </nav>
        </header>


        <main class="main-content">
            <section class="hero hero--split">
                <div class="content-block content-block--main">
                    <h1>PEDIDOS</h1><br> 

                    <p class="chamada">
                        Coloque seu nome e seu pedido<br>
                        para que possamos orar por você!
                    </p>

                    <form action="adicionar.php" method="POST" class="order-form">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" required>
                        </div>
                        <div class="input-group">
                            <label>Pedido:</label>
                            <input type="text" name="pedido" required>
                        </div>
                        <button type="submit" class="btn-submit">Enviar</button>
                    </form>
                </div>

                <div class="content-block content-block--quote">
                    <h2>
                        Não andem ansiosos por coisa alguma, mas em tudo, pela oração e súplicas,
                        e com ação de graças, apresentem seus pedidos a Deus.
                        <span>Filipenses 4:6</span>
                    </h2>
                </div>
            </section>
        </main>

        <footer>
            Jesus is King © 2026 • All rights reserved.
        </footer>

    </div>

</body>

</html>