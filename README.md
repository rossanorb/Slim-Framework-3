# thecatapi

# RODAR MIGRATIONS

## no terminal rodar o comando abaixo para criar tabelas
docker exec thecatapi_php vendor/bin/phinx migrate

## no terminal rodar o comando abaixo para desfazer as migrations
docker exec thecatapi_php vendor/bin/phinx rollback

## no terminal rodar o comando abaixo para criar um usuário  username: admin password: @#$RF@!718
docker exec thecatapi_php vendor/bin/phinx seed:run