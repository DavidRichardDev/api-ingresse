# api-ingresse

    API desenvolvida com os seguintes endpoints para gerenciamento dos dados do cliente

- http://localhost:8000/

        - Tela de abertura inicial da API

- GET http://localhost:8000/api/clients

- GET http://localhost:8000/api/clients/{id}

- POST http://localhost:8000/api/clients/
    - name (string)
    - mail (string)
    - celphone (string)
    - age (int)

- PUT http://localhost:8000/api/clients/{id}
    - name (string)
    - mail (string)
    - celphone (string)
    - age (int)

- DELETE http://localhost:8000/api/clients/{id}

Exemplo de dados:

    {
        name: Nome cliente,
        mail: cliente@mail.com,
        celphone: (11) 99999-9999,
        age: 25
    }

O método GET (/api/clients) vem com o resultado paginado.
Para ver cada página basta colocar desta forma na url /api/clients?page=2.


# Requisitos utilizados

 - PHP 7.3.4
 - mySQL 5.6.37
 - Composer 1.8.4
 - Postman
 - Docker toolbox
 - Docker-compose  1.20.1
 - git

# Ativação projeto local

Crie um banco de dados através de um SGBD de sua preferência ou linha de comando com o nome "api_ingresse" charset UTF8 Collation: utf8_unicode_ci

Rode os comandos na raiz do projeto:

    composer install
    cp env-example .env

As credenciais do banco de dados estão configurados em /.env e config/database.php da seguinte forma:

    Banco de dados: api_ingresse
    Usuário: root
    Senha: mysql (padrão do mySql, podendo utilizar a de sua preferência configurada)

Rode os comandos na raiz do projeto:
    
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve

Para rodar os testes execute o comando na raiz do projeto:

    vendor/bin/phpunit
    
Na raiz do projeto também há um documento em PDF e outro em DOCX com as evidências de teste

    evidencias_de_teste.pdf
    evidencias_de_teste.docx


