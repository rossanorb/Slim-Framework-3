# thecatapi
## Configuração:
### 1º após baixar projeto rodar o seguinte comando na raiz do projeto:
composer install
### 2º na raiz do projeto rodar o commando :
dar permissão de escrita nas pasta logs
### 3º na raiz do projeto rodar o commando :
docker-compose up -d

### 4º RODAR MIGRATIONS
### no terminal rodar o comando abaixo para criar tabelas
docker exec thecatapi_php vendor/bin/phinx migrate
### se necessário, no terminal rodar o comando abaixo para desfazer as migrations
docker exec thecatapi_php vendor/bin/phinx rollback
### com as tabelas criadas,  no terminal rodar o comando abaixo para criar um usuário padrao  username: admin password: @#$RF@!718
docker exec thecatapi_php vendor/bin/phinx seed:run


## Endpoints:

POST http://localhost:9000/login

CAMPOS:

username: admin
password: @#$RF@!718

RESPOSTA:

{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwidXNlcm5hbWUiOiJhZG1pbiIsImNyZWF0ZWRfYXQiOiIyMDIwLTEyLTIxVDIyOjU4OjA0LjAwMDAwMFoiLCJ1cGRhdGVkX2F0IjoiMjAyMC0xMi0yMVQyMjo1ODowNC4wMDAwMDBaIn0.OqzqZXJb9XLsqBBlEsXql87y8NDRY2tT2v7Pkn4KRiU"
}

