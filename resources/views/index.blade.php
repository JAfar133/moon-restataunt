<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Главная | MOON LOUNGE</title>



        <link rel="apple-touch-icon" sizes="180x180" href="/images/icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/icon/favicon-16x16.png">
        <link rel="manifest" href="/images/icon/site.webmanifest">

        @vite(['resources/js/app.js'])

    </head>
    <body class="antialiased">
        @include('layouts.header')

        @include('layouts.smoke-screen')

        <div class="main">
            @include('layouts.pages.about.index')

            @if(!empty($menus))
                @include('layouts.pages.menu.index', ['menus' => $menus])
            @endif

            @if(!empty($images))
                @include('layouts.pages.gallery.index', ['images' => $images])
            @endif

            @include('layouts.contacts')
        </div>
        @include('layouts.footer')


        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();
                for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(93189013, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/93189013" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

    </body>
</html>
