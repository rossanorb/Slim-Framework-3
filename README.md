# thecatapi
## Configuração:
### 1º após baixar projeto rodar o seguinte comando na raiz do projeto:
composer install

### 2º dar permissão de escrita nas pasta logs
### 3º na raiz do projeto rodar o commando :
docker-compose up -d

### 4º RODAR MIGRATIONS
### no terminal rodar o comando abaixo para criar tabelas
docker exec thecatapi_php vendor/bin/phinx migrate
### se necessário, no terminal rodar o comando abaixo para desfazer as migrations
docker exec thecatapi_php vendor/bin/phinx rollback
### com as tabelas criadas,  no terminal rodar o comando abaixo para criar um usuário padrao  username: admin password: @#$RF@!718
docker exec thecatapi_php vendor/bin/phinx seed:run

## Acesso ao Swagger
http://localhost:9000/dist/index.html
## Endpoints:

POST http://localhost:9000/login

CAMPOS:

username: admin
password: @#$RF@!718

RESPOSTA:

{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwidXNlcm5hbWUiOiJhZG1pbiIsImNyZWF0ZWRfYXQiOiIyMDIwLTEyLTIxVDIyOjU4OjA0LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMC0xMi0yMVQyMjo1ODowNC4wMDAwMDBaIn0.OqzqZXJb9XLsqBBlEsXql87y8NDRY2tT2v7Pkn4KRiU"
}


GET  http://localhost:9000/breeds?name=Bengal

* Enviar header Authorization com token gerado no retorno do enpoint /login pois essa rota é protegida por autenticação.

RESPOSTA:

{
    "status": true,
    "cached": false,
    "content": [
        {
            "weight": {
                "imperial": "6 - 12",
                "metric": "3 - 7"
            },
            "id": "beng",
            "name": "Bengal",
            .
            .
        }
}

cached: indica se a consulta está cacheada. Retornará true quando estiver no banco, e false quando retornado pela api.

--- Arquivo POSTMAN  "TheCatApi.postman_collection.json", para importação econtra-se disponível na raiz do projeto

## Para rodar testes, executar no terminal

docker exec thecatapi_php vendor/bin/phpunit --verbose --debug --color


## Descrição de funcionamento:

- Api faz uma busca no banco e retorna registro sem consultar api externa.

- Api não encontra no banco, então faz uma consulta a cat api, se encontrar então salva registro no banco e retorna dados retornados pela cat api

- Se conexão externa indisponível e possui registro em cache retorna registro, senão retornará erro de indisponibilidade temporária.

- Sem acesso ao banco, retorna dados da cat api *.

* supondo que o token ainda não expirou. Pois se tentar autenticar também receberá informação de indisponibilidade.
