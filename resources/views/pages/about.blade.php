<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>О нас | MOON LOUNGE - кальянная в Москве</title>

        <meta name="description" content="MOON LOUNGE - это уютная кальянная в Москве, где каждый гость может
        насладиться вкуснейшими кальянами, изысканными блюдами и авторскими коктейлями.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

        @vite(['resources/js/app.js'])

    </head>
    <body class="antialiased">
        @include('layouts.header')

        <div class="container main-content">
            @yield('content')
        </div>

        @include('layouts.footer')
    </body>
</html>
