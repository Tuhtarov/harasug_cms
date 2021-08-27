@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    {{--Основа--}}
    <section class="content">
        <h1 class="content-title">{!!$page->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                @include('adfm.components.forms.reservation-additional-form')
            </div>
        </div>
    </section>
@endsection
