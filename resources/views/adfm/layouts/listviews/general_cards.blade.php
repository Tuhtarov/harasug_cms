<ul class="content-items">
    @if(isset($cards))
        @foreach($cards as $item)
            <li class="content-item-wrapper">
                <div class="content-item">
                    <div class="content-item-background">
                        <a href="{{$item->url}}">
                            <picture>
                                <source srcset="{{asset('dist/img/chill/chill_horse.jpg')}}">
                                <img src="{{asset('dist/img/chill/chill_horse.jpg')}}" width="558" height="350"
                                     alt="Фото">
                            </picture>
                        </a>
                    </div>
                    <div class="content-item-body">
                        <h2 class="content-item-body-title"><a href="{{$item->url}}">{{$item->title}}</a></h2>
                        @if(isset($item->price))
                            <div class="content-item-body-price">
                                <p class="content-item-body-price-value" data-before="от"
                                   data-after="Р">{{$item->price}}
                                </p>
                                <p class="content-item-body-price-info">{{isset($item->price_info) ?? $item->price_info}}</p>
                            </div>
                        @endif
                        <a class="content-item-body-link" href="{{$item->url}}">Подробнее</a>
                    </div>
                </div>
            </li>
        @endforeach
    @endif
</ul>

