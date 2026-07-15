<?php

require_once __DIR__ . '/../src/versiculo.php';

use PHPUnit\Framework\TestCase;

class BibleApiTest extends TestCase
{
    private string $baseUrl = 'https://bible-api.com';

    /** @test */
    public function testApiRetornaStatusCode200()
    {
        $ch = curl_init($this->baseUrl . '/john%203:16?translation=almeida');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true); // inclui header na resposta
        curl_setopt($ch, CURLOPT_NOBODY, false);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Valida que a API respondeu com sucesso
        $this->assertEquals(200, $httpCode, 'A API deve retornar HTTP 200');
    }

    /** @test */
    public function testApiRetornaJsonValido()
    {
        $ch = curl_init($this->baseUrl . '/john%203:16?translation=almeida');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        // Valida que o retorno é um JSON válido
        $dados = json_decode($response, true);
        $this->assertNotNull($dados, 'A resposta deve ser um JSON válido');
    }

    /** @test */
    public function testApiRetornaCamposEsperados()
    {
        $ch = curl_init($this->baseUrl . '/john%203:16?translation=almeida');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $dados = json_decode($response, true);

        // Valida que os campos essenciais existem na resposta
        $this->assertArrayHasKey('text',      $dados, 'Deve ter o campo text');
        $this->assertArrayHasKey('reference', $dados, 'Deve ter o campo reference');
        $this->assertNotEmpty($dados['text'],  'O texto do versículo não deve ser vazio');
    }

    /** @test */
    public function testApiRetornaReferenciCorreta()
    {
        $ch = curl_init($this->baseUrl . '/john%203:16?translation=almeida');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $dados = json_decode($response, true);

        // Valida que a referência bate com o que foi pedido
        $this->assertStringContainsString(
            'João',
            $dados['reference'],
            'A referência deve conter João'
        );
    }

    /** @test */
    public function testGetVersiculoRetornaFallbackQuandoApiFalha()
    {
        $versiculo = getVersiculo('john 3:16', static function () {
            return false;
        });

        $this->assertArrayHasKey('text', $versiculo, 'Deve retornar um array com o campo text');
        $this->assertNotEmpty($versiculo['text'], 'O texto de fallback não deve ficar vazio');
        $this->assertStringContainsString('João 3:16', $versiculo['reference'], 'A referência de fallback deve ser válida');
    }
}