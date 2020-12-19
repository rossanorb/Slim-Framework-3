# thecatapi

# RODAR MIGRATIONS

## no terminal rodar o comando abaixo para criar tabelas
docker exec thecatapi_php vendor/bin/phinx migrate

## no terminal rodar o comando abaixo para desfazer as migrations
docker exec thecatapi_php vendor/bin/phinx rollback