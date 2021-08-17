@extends('adfm::public.layout')
@section('meta-title', $gallery->title)
@section('content')
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>

    <section class="content">
        <h1 class="content-title">{!!$gallery->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!! $gallery->content !!}
            </div>
        </div>
    </section>
@endsection
