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
                margin-bottom: 2rem;
            }

            .orangeBg {
                background-color: #d63504;
            }

            #welcomePage {
                margin-top: 3rem;
            }

            #welcomePage p {
                font-size: 0.95rem;
                color: whitesmoke;
                font-weight: bold;
                background-color: #2a2a2a;
                border-radius: 2rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                padding-left: 2rem;
                padding-right: 2rem;
            }
        </style>
    </head>
    <body class="antialiased">

        {{-- Helper Navbar  --}}
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="blackNav">
            <div class="collapse navbar-collapse justify-content-between">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('home') }}">Почетна</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('about') }}">За нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('help') }}">Помош</a>
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
                <p>
                    Health-E е веб апликација за пронаоѓање на здравствени објекти (државни болници, приватни болници и ординации и аптеки) во Скопје. Целта на апликацијата е да се овозможи на сите жители брзо и точно да пронајдат објект кој на нив им е потребен. На почетокот на страната е прикажано поле за пребарување каде што корисникот внесува тип на здравствена установа која му е потребна. Со кликање на копчето “пребарај” се прикажува листа од соодветните објекти, тип на објект (државна или приватна), линк до нивните веб страни, работно време и локација. Исто така, се прикажува и карта од градот со мапирање на соодветните локации. На почетната страна исто така се прикажани и најчесто пристапените здравствени објекти. Со кликање за нив се отвара ново прозорче каде што може да се прочитаат основните податоци за нив. Целта на апликацијата е да се олесни пристапот и барањето на здравстени објекти на сите корисници. Апликацијата ќе работи на сите веб прелистувачи и ќе биде достапна на македонски и англиски јазик. Апликацијата ќе има едноставен и интуитевен интерфејс за да може да биде лесна за користење за сите корисници.
                </p>
        </div>

        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>