@extends('adfm.public.layout')
@section('meta-title', $page->title)
@section('meta-description', $page->meta_description)

@section('content')
    <span class="thumb-container">
        <span class="thumbnails part-2"></span>
    </span>
    @if($page->title == "Кафе")
        <div class="wrapper">
            @include('adfm.layouts.main.section_cafe_menu')
        </div>
    @else
        <section class="section-feedback">
            <h1 class="section-feedback-title">{{$page->title}}</h1>
            <div class="section-feedback-body">
                <div class="wrapper">
                    {!!$page->content!!}
                    @if($page->title == "Контакты")
                        <h2 class="section-feedback-body-title">Напишите нам</h2>
                        <div class="section-feedback-body-form">
                            @include('adfm.components.forms.writeus')
                        </div>
                    @endif

                    @if($page->title == "Отзывы")
                        <h2 class="section-feedback-body-title">Оставьте свой первый отзыв</h2>
                        <div class="section-feedback-body-form">
                            @include('adfm.components.forms.comments')
                        </div>
                        @include('adfm.components.slider')
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection
