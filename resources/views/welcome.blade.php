<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
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
                    <a href="{{ url('listing') }} " >Listings</a>
                <a href="{{ url('task') }} ">Tasks</a>

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
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">Fluid jumbo heading</h1>
                        <p class="lead">Jumbo helper text</p>
                        <hr class="my-2">
                        <p>More info</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Jumbo action name</a>
                        </p>
                    </div>
                </div>
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <div class="media">
                        <a class="d-flex" href="#">
                            <img src="" alt="">
                        </a>
                        <div class="media-body">
                            <h5>Media heading</h5>
                            Media text
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
