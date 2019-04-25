<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .col{
                width: 50%;
                display:block;
                float:left;
                text-align:left;
            }

            .title {
                font-size: 30px;
            }

            p {
                color: #636b6f;
                padding: 0 25px 20px 0;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-align: left;
                margin-bottom: 0px;
            }

            .links ul{
                margin-top: 0px;
            }

            .links ul li, ul.json li {
                color: #636b6f;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                display: block;
                text-align: left;
            }
            ul.json{
                margin: 25px 0;
                padding: 0px;
            }
            ul.json li{
               padding-left: 25px;
            }
            ul.json li:first-child, ul.json li:last-child{
                padding: 0px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    API para consulta, inserçao, atualização e remoçao de clientes.
                </div>
                <div class="col">
                    <div class="links">
                        <p href="{{ url('api/clients') }}">GET - /api/clients</p>
                        <p href="{{ url('api/clients/1') }}">GET - /api/clients/{id}</p>
                        <p href="{{ url('api/clients') }}">POST - /api/clients</p>
                        <ul>
                            <li>name (string)</li>
                            <li>mail (string)</li>
                            <li>celphone (string)</li>
                            <li>age (int)</li>
                        </ul>
                        <p href="{{ url('api/clients') }}">PUT - /api/clients/{id}</p>
                        <ul>
                            <li>name (string)</li>
                            <li>mail (string)</li>
                            <li>celphone (string)</li>
                            <li>age (int)</li>
                        </ul>
                        <p href="{{ url('api/clients') }}">DELETE - /api/clients/{id}</p>
                    </div>
                </div>
                <div class="col">
                    <p>Exemplo de dados:</p>
                    <ul class="json">
                        <li>{</li>
                        <li>name: Nome cliente,</li>
                        <li>mail: cliente@mail.com,</li>
                        <li>celphone: (11) 99999-9999,</li>
                        <li>age: 25</li>
                        <li>}</li>
                    </ul>
                    <p>Obs: O método GET (/api/clients) vem com o resultado paginado.</p>
                    <p>Para ver cada página basta colocar desta forma na url /api/clients?page=2.</p>
                </div>           
            </div>
        </div>
    </body>
</html>
