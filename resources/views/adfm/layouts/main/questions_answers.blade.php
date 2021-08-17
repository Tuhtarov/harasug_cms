<section class="section-questions">
                <span class="thumb-container">
                    <span class="thumbnails part-1">
                    </span>
                </span>
    <div class="wrapper">
        <h2 class="section-questions-title">Нас часто спрашивают</h2>
        <ul class="question-items">
            @foreach($qaItems as $qa)
                <li class="question-item">
                    <h3 class="question-item-title">{{$qa->question}}</h3>
                    <p class="question-item-ansver">{{$qa->answer}}</p>
                </li>
            @endforeach
        </ul>
        <a class="question-read-more primary-link" href="{{route('qa.index')}}">Показать все ответы</a>
    </div>
</section>
