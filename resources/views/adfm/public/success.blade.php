@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    {{--Основа--}}
    <section class="content">
        <h1 class="content-title">Успешно!</h1>
        <div class="content-body">
            <div class="wrapper">
                <div style="background: rgba(105,255,105,0.71); padding: 10px; display: flex">
                    <img src="{{asset('dist/img/icon/ok_icon.svg')}}" alt="Успешно"
                         height="48" width="48" style="margin: 6px 12px">
                    <ul>
                        <li style="margin: 5px 0">Спасибо, в ближайшее время мы с Вами свяжемся.</li>
                        <li style="margin: 5px 0"><a style="text-decoration: underline" href="{{route('adfm.show.main-page')}}">На главную!</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
