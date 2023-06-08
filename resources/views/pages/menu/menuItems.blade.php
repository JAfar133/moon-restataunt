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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    @vite(['resources/js/app.js'])

</head>
<body class="antialiased">
<button onclick="window.location.href = '/menu'" class="btn arrow">
    <img width="40" src="/images/menu/arrow_icon.png" class="fab fa-arrow">
</button>

@include('pages.menu.layouts.cart-btn')

<div class="container main-content">
    <div class="menu-items mt-3 row">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @foreach ($menuItems as $item)
            <div class="item col-lg-4">
                <div class="img-item">
                    <img src="/images/menu/{{ $item->category }}/{{ $item->category }}-{{ $item->id }}.webp" alt="{{ $item->name }}">
                    <div class="item-description">
                        <h5 class="item-name">{{ $item->name }}</h5>
                        <h3 class="item-gramm">{{ $item->grams }}</h3>
                    </div>
                    <div class="price">
                        <h2 >{{ $item->price }}&#8381;</h2>
                    </div>
                    @csrf
                    <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
                    <button class="btn item-button" data-id="{{ $item->id }}" data-url="{{ route('cart.add') }}">Добавить к заказу</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
