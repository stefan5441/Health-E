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
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h1>Health-E</h1>
                </div>
                <div class="col-sm-4">
                    <p>
                        zdafdasj fd fsdj fsdfk jsdh fjsdhfkjs hfkdjsf hskfs
                    </p>
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
            <div>
                <form action="{{ route("search") }}" method="GET" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Пребарај.." name="q">
                    <button type="submit">Најди</button>
                </form>
            </div>
            <div>
                @foreach ($users as $user)
                    <p> {{ $user->name }} </p>
                    <p> Longitude:{{ $user->long }} Lattitude{{ $user->lat }} </p>
                    <br>
                @endforeach
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
