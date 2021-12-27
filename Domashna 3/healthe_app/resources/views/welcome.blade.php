<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health-E</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- JQuery  -->
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <!-- Bootstrap -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ asset('css/results.css') }}" rel="stylesheet">

        <style>
            body {
                background-image: url({{url('images/backgroundImage.png')}});
                background-size: cover;
            }
            #blackNav ul li{
                margin-left: 1rem;
                margin-right: 1rem;
            }
            #blackNav ul {
                margin-left: 1rem;
                margin-right: 1rem;
            }
            
            #blackNav {
                height: 2.5rem;
            }

            .center {
                margin: auto;
                width: 50%;
                text-align: center;
            }

            #imageLogo{
                width: 40%;
                height: 40%;
                margin-top: 2rem;
            }

            #welcomePage form{
                width: 30rem;
                margin-top: 2rem;
                margin-bottom: 2rem;
            }
        </style>
    </head>
    <body class="antialiased">

        {{-- Helper Navbar  --}}
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="blackNav">
            <div class="collapse navbar-collapse justify-content-between">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Почетна</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">За нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Помош</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Македонски</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Англиски</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- page content  --}}
        <div class="container center" id="welcomePage">
                <img src="{{url('images/logoTypeIcon.png')}}" alt="Health-E" id="imageLogo">

            <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between center">
                {{ csrf_field() }}
                <input type="text" placeholder="Пребарај..." name="q" class="form-control mr-sm-2" id="searchInput">
                <button type="submit" class="btn btn-danger my-2 my-sm-0" id="searchButton">Најди</button>
            </form>
        </div>

        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
