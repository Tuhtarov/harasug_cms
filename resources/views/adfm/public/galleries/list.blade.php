@extends('adfm::public.layout')
@section('content')
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>

    <section class="content">
        <h1 class="content-title">{{$page->title}}</h1>
        <div class="content-body">
            <div class="wrapper">
                @include('adfm.layouts.listviews.general_cards')
            </div>
        </div>
    </section>
@endsection
