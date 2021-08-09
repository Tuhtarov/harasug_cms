@extends('adfm.public.layout')
@section('meta-title', $page->title)
@section('meta-description', $page->meta_description)

@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>

    {{--Основа--}}
    <section class="content">
        <h1 class="content-title">{!!$page->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                @if($page->title == "Кафе")
                    @include('adfm.layouts.main.cafe_tabs')
                @elseif($page->title == "Отдых" || $page->title == "Галерея" || $page->title == "Новости")
                    @include('adfm.layouts.listviews.content_items_blog')
                @elseif($page->title == "Бронирование")
                    @include('adfm.layouts.listviews.reservation_cards')
                @else
                    {!!$page->content!!}
                    @if($page->title == "Контакты")
                        <h2 class="content-subtitle">Напишите нам</h2>
                        <div class="content-form">
                            @include('adfm.components.forms.writeus')
                        </div>
                    @endif
                    @if($page->title == "Отзывы")
                        <h2 class="content-subtitle">Оставьте свой первый отзыв</h2>
                        <div class="content-form">
                            @include('adfm.components.forms.comments')
                        </div>
                        @include('adfm.components.slider')
                    @endif
                @endif
            </div>
        </div>
    </section>
@endsection
