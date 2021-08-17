@extends('adfm.public.layout')
@section('content')
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    <section class="section-questions second-theme">
        <div class="wrapper">
            <h2 class="section-questions-title">{{$page->title}}</h2>
            <ul class="question-items">
                @foreach($qaItems as $qa)
                    <li class="question-item">
                        <h3 class="question-item-title">{{$qa->question}}</h3>
                        <p class="question-item-ansver">{{$qa->answer}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection

