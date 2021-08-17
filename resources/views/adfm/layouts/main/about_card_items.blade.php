<section class="section-about">
                <span class="thumb-container">
                    <span class="thumbnails part-1">
                    </span>
                </span>
    <div class="wrapper">
        <h2 class="section-about-title">О нас</h2>
        <ul class="about-items">
            @foreach($abouts as $card)
            <li class="about-item">
                <article class="about-card">
                    <a href="{{route('about.show', $card->slug)}}">
                        <picture class="about-card-picture">
{{--                            <source srcset="'https://www.fillmurray.com/400/600'" type="image/webp">--}}
                            <img src='https://www.fillmurray.com/400/600' height="302" width="342" alt="Лошадь">
                        </picture>
                    </a>
                    <div class="about-card-body">
                        <a href="{{route('about.show', $card->slug)}}">
                            <h3 class="about-card-title upper-case">{{$card->title}}</h3>
                        </a>
                        <p class="about-card-description">
                            {{$card->excerpt}}
                        </p>
                        <a href="{{route('about.show', $card->slug)}}" class="about-card-btn" aria-label="Узнать больше">
                            Подробнее
                        </a>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</section>
