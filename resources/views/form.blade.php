<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #users, #mensagens{
              height: 100%;
              border: 1px solid red;
            }
            #chat{
              height: 80vh;
            }
            #form{
              margin-top: 5rem;
            }
        </style>
    </head>
    <body>
        <div class="full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
              <div id="chat">
                <ul id="users" class="col-md-2">Users</ul>
                <ul id="mensagens" class="col-md-10">Mensagens</ul>
              </div>
              <div id="form">
                <div class="form-group col-md-offset-3 col-md-4">
                  <input type="text" class="form-control" id="mensagen" name="mensagem" value="">
                </div>
                <input type="button" class="btn btn-success col-md-2" id="enviar" value="Enviar">
              </div>
            </div>
        </div>
        <script src="http://localhost:6001/socket.io/socket.io.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#enviar').on('click', function () {
              let mensagem = $('#mensagen').val()

              $.ajax({
                method:'post',
                url: '{{url('/mensagem')}}',
                data:{mensagem:mensagem},
                success: function (data) {
                  console.log(data)
                },
                error: function (data) {
                  console.log(data)
                },
                beforeSend: function () {
                  $('#mensagem').val('');
                  $('#mensagen').val('Enviando ...');
                }
              })
            })
          })
        </script>
    </body>
</html>
