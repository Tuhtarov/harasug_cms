@include('adfm.layouts.listviews.errors')
<ul class="content-items">
    @if(isset($cards))
        @foreach($cards as $card)
            <li class="content-item-wrapper row">
                <article class="reservation-card">
                    <div class="reservation-picture">
                        <picture>
                            <source srcset="{{asset('dist/img/houses/lev-orel@webp.webp')}}" type="image/webp">
                            <img src="{{asset('dist/img/houses/lev-orel@1x.jpg')}}" height="302" width="342"
                                 alt="Интерьер Хакасской Свахи">
                        </picture>
                    </div>
                    <div class="reservation-general">
                        <div class="reservation-general-group">
                            <h2 class="reservation-general-title" {{$card->status != null ? "data-status=VIP" : null}}>
                                {{$card->type}} {{$card->title_full}}
                            </h2>
                            @if($card->price_info == 'цена / ночь')
                                <h3 class="reservation-general-price" data-before="от" data-after="Р / сутки">
                                    {{$card->price}}
                                </h3>
                            @else
                                <h3 class="reservation-general-price" data-before="от" data-after="Р">
                                    {{$card->price}} {{$card->price_info}}
                                </h3>
                            @endif
                        </div>
                        <div class="reservation-general-group">
                            <p class="reservation-general-info" data-before="Вместимость:" data-after="места">
                                {{$card->max_peoples}}
                            </p>
                        </div>
                        <div class="reservation-body">
                            <p class="reservation-body-text">
                                {{$card->description}}
                            </p>
                            <div class="reservation-body-calendar">
                                <img src="{{asset('dist/img/reservation/calendar.jpg')}}" alt="Календарь" width="253"
                                     height="161">
                            </div>
                        </div>
                        <div class="reservation-form">
                            <form class="reservation-form-inline" action="{{route('reservation.check-additional')}}"
                                  method="POST">
                                @csrf
                                <input type="hidden" required name="book[home_id]" value="{{$card->id}}">
                                <input type="date" required name="book[time_in]" value="{{date('Y-m-d')}}">
                                <input type="date" required name="book[time_out]">
                                <input type="hidden" required name="book[title]" value="{{$card->title_full}}">
                                <input type="hidden" required name="book[max_peoples]" value="{{$card->max_peoples}}">

                                <div class="reservation-form-inline-group">
                                    <label class="reservation-form-inline-label">Количество мест
                                        <input class="reservation-form-inline-field" name="book[qty_peoples]"
                                               type="number" max="{{$card->max_peoples}}" min="1"
                                               placeholder="0" value="{{$card->max_peoples}}" required>
                                    </label>
                                </div>
                                <button class="reservation-form-inline-btn" type="submit">Забронировать</button>
                            </form>
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    @endif
</ul>
