# 🔥 Em Chamas - Pedidos de Oração

**Versão:** 1.0.0

🌐 **Deploy:** [https://em-chamas-site-production.up.railway.app](https://em-chamas-site-production.up.railway.app)

## 🎯 O Problema
Muitas comunidades e grupos religiosos enfrentam dificuldades para organizar, registrar e acompanhar os pedidos de oração dos fiéis. Geralmente feitos em pedaços de papel que se perdem, a gestão dessas demandas acaba sendo ineficiente.

## 💡 A Solução
O **Em Chamas** é uma aplicação web simples (GUI) desenvolvida em PHP e MySQL que digitaliza esse processo. Os usuários podem cadastrar seus nomes e pedidos de oração diretamente em um formulário, armazenando os dados de forma segura e organizada em um banco de dados para fácil consulta da liderança.

## 🛠️ Tecnologias Utilizadas
* PHP 8+
* MySQL (Banco de Dados)
* HTML5 e CSS3 (Interface)
* PHPUnit (Testes Automatizados)
* PHPStan (Linting / Análise Estática)
* GitHub Actions (CI/CD)
* Railway (Deploy)
* Bible API (API Pública — Versículo do Dia)

## 🌐 API Integrada
O projeto consome a **[Bible API](https://bible-api.com)** para exibir um versículo do dia na página `versiculo.php`. A API é gratuita, não requer autenticação e retorna versículos em português (tradução Almeida).

Exemplo de uso:
```
GET https://bible-api.com/john%203:16?translation=almeida
```

## 🚀 Como Executar o Projeto

1. Clone este repositório:
   `git clone https://github.com/Cundari720/Em-Chamas-Site.git`
2. Mova a pasta para o diretório público do seu servidor local (ex: `htdocs` no XAMPP).
3. Importe a estrutura do banco de dados `banco.sql`
4. Altere as credenciais de banco de dados no arquivo `src/conexao.php`, se necessário.
5. Acesse `http://localhost/Em%20Chamas/src/index.php` no seu navegador.

## 🧪 Como rodar as validações de qualidade
Instale as dependências com o Composer:
`composer install`

Para rodar os testes automatizados:
`./vendor/bin/phpunit tests`

Para rodar a análise estática do código:
`./vendor/bin/phpstan analyse src --level=1`

## 👤 Autor
Desenvolvido por **Matheus Lopes Cundari**