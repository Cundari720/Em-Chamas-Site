<?php
function getFallbackVersiculo($referencia = 'john 3:16')
{
    return [
        'text' => 'Porque Deus amou o mundo de tal maneira que deu o seu Filho unigênito, para que todo aquele que nele crê não pereça, mas tenha a vida eterna.',
        'reference' => 'João 3:16',
    ];
}

// Busca um versículo aleatório ou específico
function getVersiculo($referencia = 'john 3:16', $requester = null)
{
    if ($requester === null) {
        $requester = static function ($url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 8);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'EmChamasSite/1.0');

            $response = curl_exec($ch);
            if ($response === false) {
                curl_close($ch);
                return false;
            }

            curl_close($ch);
            return $response;
        };
    }

    $url = 'https://bible-api.com/' . urlencode($referencia) . '?translation=almeida';
    $response = $requester($url);

    if ($response === false || !is_string($response)) {
        return getFallbackVersiculo($referencia);
    }

    $dados = json_decode($response, true);
    if (!is_array($dados) || empty($dados['text']) || empty($dados['reference'])) {
        return getFallbackVersiculo($referencia);
    }

    return [
        'text' => trim((string) $dados['text']),
        'reference' => trim((string) $dados['reference']),
    ];
}

function getVersiculoDoDia()
{
    $versiculos = [
        'john 3:16',
        'psalms 23:1',
        'philippians 4:13',
        'jeremiah 29:11',
        'romans 8:28',
        'matthew 11:28',
        'isaiah 40:31',
    ];

    $indiceDoDia = date('z') % count($versiculos);
    $referencia = $versiculos[$indiceDoDia];

    return getVersiculo($referencia);
}

function renderVersiculoPage($versiculo = null)
{
    if ($versiculo === null) {
        $versiculo = getVersiculoDoDia();
    }
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Em Chamas</title>
        <link rel="icon" href="icon.png" type="image/png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="page-versiculo">

        <div class="container">

            <header>
                <div class="logo">
                    EM CHAMAS
                </div>

                <nav>
                    <ul>
                        <li><a href="index.php">INÍCIO</a></li>
                        <li><a href="informacoes.php">INFORMAÇÕES</a></li>
                        <li><a href="versiculo.php">VERSÍCULO DO DIA</a></li>
                        <li><a href="pedidos.php">PEDIDOS</a></li>
                    </ul>
                </nav>
            </header>


            <main class="main-content">
                <section class="hero">
                    <div class="content-block">
                        <h2>VERSÍCULO DO DIA</h2><br><br>
                        <h2 class="versiculo">
                            <?php
                            if (!empty($versiculo['text']) && !empty($versiculo['reference'])) {
                                echo '"' . htmlspecialchars($versiculo['text'], ENT_QUOTES, 'UTF-8') . '"<br><br>';
                                echo '- ' . htmlspecialchars($versiculo['reference'], ENT_QUOTES, 'UTF-8');
                            } else {
                                echo 'Não foi possível carregar o versículo do dia.';
                            }
                            ?>
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
    <?php
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    renderVersiculoPage();
}
