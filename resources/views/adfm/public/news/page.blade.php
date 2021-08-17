@extends('adfm::public.layout')
@section('meta-title', $news->title)
@section('content')
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>

    <section class="content">
        <h1 class="content-title">{!!$news->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!! $news->content !!}
            </div>
        </div>
    </section>
@endsection
