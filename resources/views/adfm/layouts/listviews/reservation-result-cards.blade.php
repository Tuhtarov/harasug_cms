@include('adfm.layouts.listviews.errors')
<ul class="content-items">
    @if(isset($cards) && $cards->count() > 0)
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
                        </div>
                        <div class="reservation-form">
                            <form class="reservation-form-inline" method="POST"
                                  action="{{route('reservation.check-home')}}">
                                @csrf
                                <input type="hidden" value="{{$card->id}}" name="book[home_id]">
                                <input type="hidden" value="{{$card->title_full}}" name="book[title]">
                                <input type="hidden" value="{{$data['time_in']}}" name="book[time_in]">
                                <input type="hidden" value="{{$data['time_out']}}" name="book[time_out]">
                                <input type="hidden" value="{{$data['qty_child']}}" name="book[qty_child]">
                                <input type="hidden" value="{{$data['qty_old']}}" name="book[qty_old]">
                                <input type="hidden" value="{{$card->max_peoples}}" name="book[max_peoples]">
                                <button class="reservation-form-inline-btn" type="submit">Забронировать</button>
                            </form>
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    @endif
</ul>
