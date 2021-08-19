@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    <section class="content">
        <h1 class="content-title">{!!$page->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!!$home->description!!}
                <div class="content-nav">
                    <a class="btn btn-primary mt-3 item-a-c" href="{{route('reservation.index')}}">Забронировать</a>
                </div>
            </div>
        </div>
    </section>
@endsection
