<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health-E</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
                height: 100%;
            }
            #tableMap{
                margin-top: 4rem;
            }
            #searchNav {
                margin-top: 4rem;
            }
        </style>
    </head>
    <body class="antialiased">

        {{-- NavBar --}}
        <div class="container" id="searchNav">
            <div class="row navbar navbar-dark">
                <div class="col-sm-2">
                    <a class="navbar-brand">Health-E</a>
                </div>

                <div class="col-sm-5">
                    <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Пребарај..." name="q" class="form-control mr-sm-2" id="searchInput">
                        <button type="submit" class="btn btn-danger my-2 my-sm-0" id="searchButton">Најди</button>
                    </form>
                </div>

                <div class="col-sm-4 pl-sm-3" id="navbarButtons">
                    <button type="button" class="btn btn-danger">Освежи локација</button>
                    <button type="button" class="btn btn-secondary">Додади твоја локација</button>
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
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Working Hours</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="table-light">
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $user->type }}</td>
                                    <td>8:00 - 20:00</td>
                                    <td>No adress available</td>
                                    <td>www.google.com</td>
                                </tr>
                                <?php 
                                    echo "<script type='text/javascript'>addMarker('$user->long', '$user->lat');</script>"
                                ?>
                            @endforeach
                        </tbody>
                    </table>
                    <span>
                        {{ $users->links('pagination::bootstrap-4') }}
                    </span>
                </div>
                <div class="col-sm-6">
                    <div id='map' style='width: 100%; height: 100%;'></div>
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
                zoom: 10
            });
            function addMarker(lng, lat){
                const marker = new mapboxgl.Marker()
                    .setLngLat([lng, lat])
                    .addTo(map);
            }
        </script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
