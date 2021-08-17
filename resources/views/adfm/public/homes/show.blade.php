@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    <section class="content">
        <h1 class="content-title">{!!$page->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!!$home->description!!}
            </div>
        </div>
    </section>
@endsection
