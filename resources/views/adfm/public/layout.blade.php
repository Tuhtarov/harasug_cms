<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('meta-title')@show</title>
    <meta name="description" content="@section('meta-description')@show">
{{--    <link type="text/css" rel="stylesheet" href="{{asset('dist/css/critical.css')}}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{asset('dist/css/main.css')}}">--}}
    <link type="text/css" rel="stylesheet" href="{{asset('dist/css/app.css')}}">
</head>
<body class="page">

<header class="header">
    @include('adfm.layouts.header')
</header>

<main class="main">
    @section('content')
    @show
    {{--Секция с подпиской на соц.сети--}}
    @if($page->title == "Контакты" || $page->title == "Главное")
        @include('adfm.layouts.main.section_subscribe_socials')
    @endif
</main>

<footer class="footer">
    @include('adfm.layouts.footer')
</footer>

{{--Отложенная загрузка стилей сайта--}}
<script>
    function load(url) {
        let link = document.createElement('link')
        link.href = url
        link.rel = 'stylesheet'
        link.type = 'text/css'
        document.body.appendChild(link)
    }
    load('{{asset('dist/css/lib/mmenu-light.css')}}')
</script>

{{--Включение табов на странице кафе--}}
@if($page->title === "Кафе")
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.cafe-tabs-target-link').forEach((item) =>
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const id = e.target.getAttribute('href').replace('#', '');
                    document.querySelectorAll('.cafe-tabs-target-link').forEach((link) => link.classList.remove('active'))
                    document.querySelectorAll('.cafe-tabs-block').forEach((block) => block.classList.remove('active'));
                    item.classList.add('active')
                    document.getElementById(id).classList.add('active')
                })
            )
            let target_link = document.querySelector('.cafe-tabs-target-link')
            if(target_link) target_link.click()

            let tables = document.querySelectorAll('.menu-section-items')
            tables.forEach(table => {
                if (+table.children.length % 2 === 0) table.classList.add('last-items-border-none')
            })
        })
    </script>
@endif

{{--Включение слайдера на странице отзывов--}}
@if($page->title === "Отзывы")
    <script defer src="{{asset('dist/js/slider.js')}}"></script>
@endif

{{--Подключение & иницализация плагина mmenu--}}
<script defer src="{{asset('dist/js/lib/mmenu-light.js')}}"></script>
<script defer src="{{asset('dist/js/lib/mmenu.js')}}"></script>

{{--оживление кастомных select и выбор языка сайта --}}
<script defer src="{{asset('dist/js/site.js')}}"></script>
</body>
</html>
