<div class="section-house">
                <span class="thumb-container">
                    <span class="thumbnails part-1">
                    </span>
                </span>
    <div class="wrapper">
        <ul class="house-card-items">
            @foreach($homes as $home)
            <li class="house-card-item">
                <div class="house-card">
                    <a href="{{$home->slug}}">
                        <picture>
                            <img class="house-card-image" src='https://www.fillmurray.com/400/600' height="420"
                                 width="264" alt="{{"Изображение юрты"}}">
                        </picture>
                    </a>
                    <div class="house-card-body">
                        <a href="{{$home->slug}}" class="house-card-title" data-type="{{$home->type}}">{{$home->title}}</a>
                        <div class="house-card-price">
                            <p class="house-card-price-value" data-before="от" data-after="Р">{{$home->price}}</p>
                            <p class="house-card-price-description">{{$home->price_info}}</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
