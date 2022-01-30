<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health-E</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- JQuery  -->
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>  
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">   
        <!-- MapBox -->
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    </head>
    <body class="antialiased">