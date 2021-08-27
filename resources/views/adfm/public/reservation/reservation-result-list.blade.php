@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    {{--Основа--}}
    <section class="content">
        <h1 class="content-title">{!!$page->title!!}</h1>
        @if(!isset($cards) || $cards == null || $cards->count() < 1)
            <h2 class="content-subtitle">По вашему запросу отсутствуют доступные для бронирования юрты</h2>
            <div class="content-body">
                <div class="wrapper">
                    <div style="margin: 10px 0 25px">
                        <p style="margin: 0 0 10px">Ваш запрос:</p>
                        <ul>
                            <li>Дата заезда: {{$data['time_in']}}</li>
                            <li>Дата отъезда: {{$data['time_out']}}</li>
                            <li>Количество взрослых: {{$data['qty_old']}}</li>
                            <li>Количество детей: {{$data['qty_child']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <h2>По вашему запросу найдены доступные юрты: </h2>
            <div class="content-body">
                <div class="wrapper">
                    <div style="margin: 10px 0 25px">
                        <p style="margin: 0 0 10px">Ваш запрос:</p>
                        <ul>
                            <li>Дата заезда: {{$data['time_in']}}</li>
                            <li>Дата отъезда: {{$data['time_out']}}</li>
                            <li>Количество взрослых: {{$data['qty_old']}}</li>
                            <li>Количество детей: {{$data['qty_child']}}</li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    @include('adfm.layouts.listviews.reservation-result-cards')
                </div>
            </div>
        @endif
    </section>
@endsection
