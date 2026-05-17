<?php
// Busca um versículo aleatório ou específico
function getVersiculo($referencia = 'john 3:16')
{
    $url = 'https://bible-api.com/' . urlencode($referencia) . '?translation=almeida';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Versículos para sortear como "versículo do dia"
$versiculos = [
    'john 3:16',
    'psalms 23:1',
    'philippians 4:13',
    'jeremiah 29:11',
    'romans 8:28',
    'matthew 11:28',
    'isaiah 40:31',
];

// Sorteia baseado no dia (mesmo versículo o dia todo)
$indiceDoDia = date('z') % count($versiculos); // 'z' = dia do ano (0-365)
$referencia = $versiculos[$indiceDoDia];

$versiculo = getVersiculo($referencia);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Em Chamas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

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


        <section class="hero">

            <div class="left-content">

                <h2>VERSÍCULO DO DIA</h2><br><br>   
                <h2 class="versiculo">
                    <?php
                    if (isset($versiculo['text'])) {
                        echo '"' . $versiculo['text'] . '"<br><br>';
                        echo '- ' . $versiculo['reference'];
                    } else {
                        echo 'Não foi possível carregar o versículo do dia.';
                    }
                    ?>
                </h2>

            </div>

        </section>

        <footer>
            Jesus is King © 2026 • All rights reserved.
        </footer>

    </div>

</body>

</html>