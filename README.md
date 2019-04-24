# api-ingresse

#REQUISITOS UTILIZADOS

PHP 7.3.4
mySQL 5.6.37
Composer 1.8.4
Postman
Docker toolbox
Docker-compose  1.20.1
git

#ATIVAÇÂO PROJETO LOCAL
composer install

Crie um banco de dados através de um SGBD de sua preferência ou linha de comando com o nome "api_ingresse" charset UTF8 Collation: utf8_unicode_ci

As credenciais do banco de dados estão configurados em /.env e config/database.php da seguinte forma:
db_name: api_ingresse
db_user: root
db_pass: mysql

Rode os comandos na raiz do projeto:
    php artisan migrate
    php artisan db:seed
    <!-- php artisan key:generate -->
    php artisan serve

Para rodar os testes execute o comando na raiz do projeto:
    vendor/bin/phpunit

