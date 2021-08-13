@if($comments->count() > 0)
    <div class="content-slider">
        <div class="slider" style="overflow: hidden;">
            <ul class="slider-content">
                @foreach($comments as $comment)
                    <li class="slider-item">
                        <p class="slider-item-title">{{$comment->username}}</p>
                        <time class="slider-item-time" datetime="2020-06-10">{{$comment->getFormattedDate()}}</time>
                        <p class="slider-item-text">
                            {{$comment->message}}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        <button class="slider-btn previous" aria-label="Показать предыдущее"></button>
        <button class="slider-btn next" aria-label="Показать следующее"></button>
    </div>
@endif
