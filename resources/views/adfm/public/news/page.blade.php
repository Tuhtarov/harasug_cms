@extends('adfm::public.layout')
@section('meta-title', $news->title)
@section('content')
    <section class="content">
        <h1 class="content-title">{!!$news->title!!}</h1>
        <div class="content-body">
            <div class="wrapper">
                {!! $news->content !!}
            </div>
        </div>
    </section>
@endsection
