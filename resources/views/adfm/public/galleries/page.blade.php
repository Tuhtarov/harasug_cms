@extends('adfm::public.layout')
@section('meta-title', $gallery->title)
@section('content')
    <section class="content">
        <h1 class="content-title">{!!$gallery->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!! $gallery->content !!}
            </div>
        </div>
    </section>
@endsection
