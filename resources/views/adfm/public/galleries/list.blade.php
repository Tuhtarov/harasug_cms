@extends('adfm::public.layout')
@section('content')
    <section class="content">
        <h1 class="content-title">{{$page->title}}</h1>
        <div class="content-body">
            <div class="wrapper">
                @include('adfm.layouts.listviews.general_cards')
            </div>
        </div>
    </section>
@endsection
