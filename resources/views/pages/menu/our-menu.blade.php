<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Меню | MOON LOUNGE - кальянная в Москве</title>



    <link rel="apple-touch-icon" sizes="180x180" href="/images/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icon/favicon-16x16.png">
    <link rel="manifest" href="/images/icon/site.webmanifest">

    @vite(['resources/js/app.js'])
</head>
<body class="antialiased">
<button onclick='window.location.href = "/"' class="btn arrow">
    <img width="40" src="/images/menu/arrow_icon.png" class="fab fa-arrow">
</button>

@include('pages.menu.layouts.cart-btn')

<div class="container main-content">
    <div class="menu-items mt-3 row categories">
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/salads">
                    <img src="/images/menu/salads/salads-11.webp" alt="Салата">
                    <h2 class="chapter-description">Салаты</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/hot">
                    <img src="/images/menu/hot/hot-91.webp" alt="Горячее">
                    <h2 class="chapter-description">Горячее</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/snacks">
                    <img src="/images/menu/snacks/snacks-21.webp" alt="Закуски">
                    <h2 class="chapter-description">Закуски</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/barbecue">
                    <img src="/images/menu/barbecue/barbecue-41.webp" alt="Мангал">
                    <h2 class="chapter-description">Мангал</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/burgers">
                    <img src="/images/menu/burgers/burgers-71.webp" alt="Бургеры">
                    <h2 class="chapter-description">Бургеры</h2>
                </a>
            </div>
        </div>

{{--        <div class="item col-md-4">--}}
{{--            <div class="img-item">--}}
{{--                <a href="/menu/garnish">--}}
{{--                    <img src="/images/menu/garnish/garnish-21.webp" alt="Гарнир">--}}
{{--                    <h2 class="chapter-description">Гарнир</h2>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/pasta">
                    <img src="/images/menu/pasta/pasta-31.webp" alt="Паста">
                    <h2 class="chapter-description">Паста</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/khachapuri">
                    <img src="/images/menu/khachapuri/khachapuri-111.webp" alt="Хачапури">
                    <h2 class="chapter-description">Хачапури</h2>
                </a>
            </div>
        </div>
{{--        <div class="item col-md-4">--}}
{{--            <div class="img-item">--}}
{{--                <a href="/menu/pizza">--}}
{{--                    <img src="/images/menu/pizza/pizza-81.webp" alt="Пицца">--}}
{{--                    <h2 class="chapter-description">Пицца</h2>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/rolls">
                    <img src="/images/menu/rolls/rolls-51.webp" alt="Роллы">
                    <h2 class="chapter-description">Роллы</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/soups">
                    <img src="/images/menu/soups/soups-61.webp" alt="Супы">
                    <h2 class="chapter-description">Супы</h2>
                </a>
            </div>
        </div>
        <div class="item col-md-4">
            <div class="img-item">
                <a href="/menu/desserts">
                    <img src="/images/menu/desserts/desserts-101.webp" alt="Дессерты">
                    <h2 class="chapter-description">Дессерты</h2>
                </a>
            </div>
        </div>


    </div>
</div>

{{--@include('layouts.footer')--}}
</body>
</html>
