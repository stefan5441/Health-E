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
    </head>
    <body class="antialiased">

        {{-- NavBar --}}
        <div class="container my-4">
            <div class="row navbar navbar-dark">
                <div class="col-sm-2">
                    <a class="navbar-brand">Health-E</a>
                </div>

                <div class="col-sm-5">
                    <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Пребарај.." name="q" class="form-control mr-sm-2" id="searchInput">
                        <button type="submit" class="btn btn-danger my-2 my-sm-0" id="searchButton">Најди</button>
                    </form>
                </div>

                <div class="col-sm-4 pl-sm-3">
                    <button type="button" class="btn btn-danger">Освежи локација</button>
                    <button type="button" class="btn btn-secondary">Додади твоја локација</button>
                </div>
            </div>
        </div>

        {{-- search results --}}
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Working Hours</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $user->type }}</td>
                                    <td>8:00 - 20:00</td>
                                    <td>No adress available</td>
                                    <td>www.google.com</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-5"></div>
            </div>
        </div>

        {{--     <div>
                @foreach ($users as $user)
                    <p> {{ $user->name }} </p>
                    <p> Longitude:{{ $user->long }} Lattitude{{ $user->lat }} </p>
                    <br>
                @endforeach
            </div>
        </div> --}}

        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
