<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOON LOUNGE</title>

        @vite(['resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="container main-content">
            <div class="text-center">
                <h2 class="mb-4">Moon Lounge</h2>
                <h3 class="mb-4">{{$text ?? 'Страница не найдена'}}</h3>
                <h4 class="mb-2">
                    <a href="/" style="text-decoration: none; color: #f2edc5">Вернуться на главную</a>
                </h4>
                @if (url()->previous())
                    <h4 class="mb-2">
                        <a href="{{url()->previous()}}" style="text-decoration: none; color: #f2edc5">Вернуться назад</a>
                    </h4>
                @endif
            </div>
        </div>
    </body>
</html>
