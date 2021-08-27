@extends('adfm.public.layout')
@section('content')
    {{--Декор по бокам сайта--}}
    <span class="thumb-container"><span class="thumbnails part-2"></span></span>
    {{--Основа--}}
    <section class="content">
        <h1 class="content-title">Ошибка.</h1>
        <div class="content-body">
            <div class="wrapper">
                <div class="control-column">
                    <div class="control-row" style="justify-content: flex-start;">
                        <div style="background: #b0efff; padding: 10px; display: flex">
                            <img src="{{asset('dist/img/icon/warning_ico.svg')}}" alt="Предупреждение"
                                 height="48" width="48" style="margin: 6px 12px">
                            <ul>
                                <li style="margin: 5px 0">При обработки данных произошли неподалки со стороны сервера.</li>
                                <li style="margin: 5px 0">Пожалуйста, сообщите нам об ошибке.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
