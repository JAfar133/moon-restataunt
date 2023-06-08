<div class="container" id="menu-src">

    <div class="row mt-5">
        <div class=" col-md-5">
            <div class="card gallery-card menu-card h-100">
                <a href="#menu-1" class="menu-img">
                    <img src="/images/menu-main.webp" class="gallery-img" alt="photo">
                    <div class="overlay">
                        <p>Подробнее...</p>
                    </div>
                </a>
            </div>
            @foreach($menus as $menu)
                <a data-fancybox="menu" href="{{$menu->src}}" class="d-none">
                    <img src="{{$menu->src}}" class="gallery-img menu-img" alt="photo">
                </a>
            @endforeach
        </div>
        <div class="col-md-6 mt-2 menu-text">
            <h2 class="mt-4" id="menu-section">О нашем меню!</h2>
            <hr>
            <p>Меню нашего ресторана предлагает разнообразные блюда, которые удовлетворят любой вкус.
                Вы можете выбрать из четырех видов пиццы: Цезарь, Мясной пир, Четыре сыра и Пепперони.</p>
            <p>Для любителей мяса в нашем меню представлены различные виды блюд, приготовленных на мангале.
                Вы можете насладиться сочными шашлыками из говядины или курицы, а также
                нашими великолепными стейками.</p>
            <p>Для тех, кто любит бургеры, мы также предлагаем вкуснейший бургер с нашим фиременным соусом и сочной
                котлетой на гриле из мраморной говядины.
            </p>
            <p>Приходите к нам и наслаждайтесь вкусом наших блюд и напитков!</p>
            <a href="/menu">Посмотреть меню</a>
        </div>
    </div>
</div>



