<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Корзина | MOON LOUNGE</title>

    <meta name="description" content="MOON LOUNGE - это уютная кальянная в Москве, где каждый гость может
        насладиться вкуснейшими кальянами, изысканными блюдами и авторскими коктейлями.">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icon/favicon-16x16.png">
    <link rel="manifest" href="/images/icon/site.webmanifest">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    @vite(['resources/js/app.js'])

</head>
<body class="antialiased">

    <button onclick="goBack()" class="btn arrow">
        <img width="40" src="/images/menu/arrow_icon.png" class="fab fa-arrow">
    </button>
    <div class="container mt-5 basket-page">
        <h2 class="mt-5">Ваша Корзина</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @php $total = 0; @endphp
        <hr style="margin-top: 5px">
        @forelse (session('cart', []) as $id => $item)
        <div id="cart-item-{{ $id }}">
            <div class="cart-item">
                <div class="cart-img">
                    @if (isset($item['category']))
                        <img src="/images/menu/{{ $item['category'] }}/{{$item['category'] }}-{{ $id }}.webp" alt="{{ $item['name'] }}">
                    @endif
                </div>
                <div class="cart-content">
                    <div class="cart-name">
                        <div>{{ $item['name'] }}</div>
                    </div>
                    <div class="sub-content">
                        <div style="display: flex" class="quantity">
                            <button class="btn-update minus-btn" type="button" data-id="{{ $id }}" data-url="{{ route('cart.update', $id) }}" data-action="minus">
                                <span style="color: white">-</span>
                            </button>
                            <span class="quantity mx-2">{{ $item['quantity'] }}</span>
                            <button class="btn-update plus-btn" type="button" data-id="{{ $id }}" data-url="{{ route('cart.update', $id) }}" data-action="plus">
                                <span style="color: white;">+</span>
                            </button>
                        </div>
                        <div>{{ $item['price'] }}₽</div>
                    </div>
                </div>
                <div class="cart-delete">
                    <div class="subtotal" hidden="hidden">{{ $subtotal = $item['quantity'] * $item['price'] }}₽</div>
                    <button class="btn delete-btn" type="button" data-id="{{ $id }}" data-url="{{ route('cart.remove', $id) }}">
                        <img width="23" src="/images/menu/delete1.png" class="fab fa-arrow">
                    </button>
                </div>
                @php $total += $subtotal; @endphp
            </div>
            <hr>
        </div>
        @empty
            <div>Корзина пуста</div>
            <hr>
        @endforelse
        <div class="cart-foot">
            <div class="price-total">
                <div class="text-right">
                    <strong>Всего:
                        <span id="cart-total">{{ $total }}</span>₽
                    </strong>
                </div>
            </div>
            @csrf
            <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Очистить корзину</button>
            </form>
        </div>
    </div>
    <script>
        function goBack() {
            if (sessionStorage.getItem('prevPage')) {
                window.location.href = sessionStorage.getItem('prevPage');
            } else {
                window.location.href = "/menu"
            }
        }
    </script>
</body>
</html>
