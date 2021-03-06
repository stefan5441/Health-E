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

        <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

        <!-- Inside CSS -->
        <style>
            #navbarButtons {
                direction: rtl;
            }
            .table {
                height: 30rem;
            }
            #tableMap{
                margin-top: 2rem;
            }
            #searchNav {
                margin-top: 2rem;
            }
            .table thead tr {
                line-height: 1rem;
            }
            .table thead tr th {
                text-align: center;
                vertical-align: middle;
            }
            .table tbody tr {
                line-height: 1rem;
            }
            .table tbody tr th {
                text-align: center;
                vertical-align: middle;
            }
            .table tbody tr td {
                text-align: center;
                vertical-align: middle;
            }
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

            #searchNav img {
                height: 3.5rem;
            }

            .orangeBg {
                background-color: #d63504;
            }

        </style>
    </head>
    <body class="antialiased">

        {{-- Helper Navbar  --}}
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="blackNav">
            <div class="collapse navbar-collapse justify-content-between">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('home') }}">??????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('about') }}">???? ??????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route('help') }}">??????????</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????????</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- NavBar --}}
        <div class="container" id="searchNav">
            <div class="row navbar navbar-dark">
                <div class="col-sm-3">
                    <a class="navbar-brand" href="{{ URL::route('home') }}">
                        <img src="{{url('images/logoIcon.png')}}" alt="Health-E">
                        <img src="{{url('images/logoType.png')}}" alt="Health-E">
                    </a>
                </div>

                <div class="col-sm-5">
                    <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between">
                        {{ csrf_field() }}
                        <input type="text" placeholder="????????????????..." name="q" class="form-control mr-sm-2" id="searchInput">
                        <button type="submit" class="btn btn-danger my-2 my-sm-0 orangeBg" id="searchButton">??????????</button>
                    </form>
                </div>

                <div class="col-sm-4 pl-sm-3" id="navbarButtons">
                    <button type="button" class="btn btn-danger orangeBg" onclick="myLocation()">???????????? ????????????????</button>
                    <button type="button" class="btn btn-secondary" onclick="myLocation()">???????????? ?????????? ????????????????</button>
                </div>
            </div>
        </div>

        {{-- search results --}}
        <div class="container" id="tableMap">
            <div class="row">
                <div class="col-sm-6">
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">??????</th>
                                <th scope="col">??????</th>
                                <th scope="col">?????????????? ??????????</th>
                                <th scope="col">????????????</th>
                                <th scope="col">?????? ????????????</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="table-light">
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->working_hours }}</td>
                                    <td>{{ $user->address }}</td>
                                    @if ($user->website == "N/A")
                                        <td> N/A </td>
                                    @else
                                        <td><a href="{{ $user->website }}">???????? ???? ????????????????!</a></td>
                                    @endif
                                </tr>
                                <?php 
                                    echo "<script type='text/javascript'>
                                        $(document).ready(function() {
                                            addMarker('$user->long', '$user->lat');
                                        });
                                        </script>"
                                ?>
                            @endforeach

                        </tbody>
                    </table>
                    <span>
                        {{ $users->links('pagination::bootstrap-4') }}
                    </span>
                </div>
                <div class="col-sm-6">
                    <div id='map' style='width: 100%; height: 30rem;'></div>
                </div>
            </div>
        </div>


        <!--MapBox JS -->
        <script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic3RlZmFuZGlhbnMiLCJhIjoiY2t4aHAwZWg2MnVjeTMwbzFtam54enpqYiJ9.B264t4XyHpD9f0t-sSooMQ';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [21.4254, 41.9981],
                zoom: 12
            });

            function addMarker(lng, lat){
                const marker = new mapboxgl.Marker()
                    .setLngLat([lng, lat])
                    .addTo(map);
            }

            function myLocation(){
                console.log("YEP");
                navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {enableHighAccuracy: true });
            }

            function successLocation(position){
                const myMarker = new mapboxgl.Marker({
                    color: "#dd0000"
                }).setLngLat([position.coords.longitude, position.coords.latitude]).addTo(map);
            }

            function errorLocation(){
                alert("You must enable location for this option.")
            }
        </script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
