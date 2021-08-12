@extends('adfm::public.layout')
@section('meta-title', $page->title)
@section('meta-description', $page->meta != null && $page->meta['description'] != null ? $page->meta['description'] : "Этно-культурная база отдыха Харасуг")

@section('content')
    <div class="main-body">
        @include('adfm.layouts.main.home_items')
        @include('adfm.layouts.main.about_card_items')
        @include('adfm.layouts.main.questions_answers')
        @include('adfm.components.forms.checkdate')
        @include('adfm.layouts.main.section_subscribe_socials')
    </div>
@endsection
