@extends('adfm::public.layout')
@section('meta-title', 'Новости')
@section('content')
    <section class="content">
        <h1 class="content-title">Новости</h1>
        <div class="content-body">
            <div class="wrapper">
                @include('adfm.layouts.listviews.general_cards')
            </div>
        </div>
    </section>
@endsection
