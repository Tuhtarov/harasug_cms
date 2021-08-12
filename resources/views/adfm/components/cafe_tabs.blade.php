<div class="cafe-tabs">

    {{--Создание менюшки табов--}}
    <nav class="cafe-tabs-target" role="menu">
        @foreach ($cafe as $cafe_title => $cafe_body)
            <a class="cafe-tabs-target-link active" href="#{{$cafe_title}}" role="menuitem"
               aria-label="Отобразить меню европейской кухни">
                {{$cafe_title}}
            </a>
        @endforeach
    </nav>

    {{--Заполнение тела каждого из таба--}}
    <div class="cafe-tabs-body">
        {{--Создание табов--}}
        @foreach ($cafe as $cafe_title => $cafe_body)

            {{--cafe_title - key - наименованине кухни--}}
            {{--cafe_body - value - тело кухни--}}
            <div id="{{$cafe_title}}"
                 class="cafe-tabs-block @if($cafe_body['image'] == 'есть'){{"witch-image"}}@endif">
                {{--Если есть фото с баннером, то выведи баннер--}}
                @if($cafe_body['image'] == 'есть')
                    <div class="cafe-tabs-block-info">
                        <img src="dist/img/cafe/image_dinner_optimize.jpg" height="167" width="290" alt="">
                        @if($cafe_body['message'] != null || $cafe_body['message'] != "")
                            <p class="cafe-tabs-block-info-text">
                                {{$cafe_body['message']}}
                            </p>
                        @endif
                    </div>
                @endif

                {{--Заполнение секции menu-section контентом--}}
                @foreach($cafe_body['categories'] as $category => $category_body)

                    {{--category: key - наименование категории--}}
                    {{--category_body: value - товары категории--}}

                    {{--Если количество продуктов > 0, начинай заполнение--}}
                    @if($category_body['records']->count() > 0)
                        <section class="menu-section @if($category_body['image'] == null){{"no-category-image"}}@endif">
                            <h2 class="menu-section-title">{{$category}}</h2>

                            {{--Если у категории есть изображение, выводим над началом items--}}
                            @if($category_body['image'] != null)
                                <div class="menu-section-image">
                                    <picture>
                                        <source srcset="dist/img/cafe/hamburger.png" media="(min-width: 992px)">
                                        <img src="dist/img/cafe/hamburger.png" height="137" width="200" alt="">
                                    </picture>
                                </div>
                            @endif

                            {{--Заполнение секции имеющимися товарами--}}
                            <ul class="menu-section-items">
                                @foreach($category_body['records'] as $record)
                                    <li class="menu-section-item">
                                        <div class="menu-section-item-block-desc">
                                            <h3 class="menu-section-item-block-desc-title">{{$record->title}}</h3>
                                            <p class="menu-section-item-block-desc-text">{{$record->description}}</p>
                                        </div>
                                        <div class="menu-section-item-block-price">
                                            <p class="menu-section-item-block-price-value"
                                               data-currency="Р">{{$record->price}}</p>
                                            <p class="menu-section-item-block-price-weight">{{$record->weight}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    {{--        <!-- Меню национальной кухни -->--}}
    {{--            <div id="national-cafe" class="cafe-tabs-block witch-image">--}}
    {{--                <div class="cafe-tabs-block-info">--}}
    {{--                    <img src="dist/img/cafe/image_dinner_optimize.jpg" height="167" width="290"--}}
    {{--                         alt="Бутерброды">--}}
    {{--                    <p class="cafe-tabs-block-info-text">--}}
    {{--                        Национальные блюда хакасской кухни готовим по предварительным заказам--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--                <section class="menu-section">--}}
    {{--                    <h2 class="menu-section-title">Блюда Хакасской кухни</h2>--}}
    {{--                    <div class="menu-section-image">--}}
    {{--                        <picture>--}}
    {{--                            <source srcset="dist/img/cafe/hamburger.png" media="(min-width: 992px)">--}}
    {{--                            <img src="dist/img/cafe/hamburger.png" height="137" width="200" alt="">--}}
    {{--                        </picture>--}}
    {{--                    </div>--}}
    {{--                    <ul class="menu-section-items">--}}
    {{--                        <li class="menu-section-item">--}}
    {{--                            <div class="menu-section-item-block-desc">--}}
    {{--                                <h3 class="menu-section-item-block-desc-title">Завтрак 1. Яичница с сосиской--}}
    {{--                                    на Бородинском--}}
    {{--                                    хлебе</h3>--}}
    {{--                                <p class="menu-section-item-block-desc-text">чай, кофе (на выбор), сыр,--}}
    {{--                                    сливочное--}}
    {{--                                    масло</p>--}}
    {{--                            </div>--}}
    {{--                            <div class="menu-section-item-block-price">--}}
    {{--                                <p class="menu-section-item-price-value" data-currency="Р">250</p>--}}
    {{--                            </div>--}}
    {{--                        </li>--}}
    {{--                    </ul>--}}
    {{--                </section>--}}
    {{--            </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}
</div>

{{--НЕ ТРОНУТО--}}
{{--<div class="cafe-tabs">--}}
{{--    <nav class="cafe-tabs-target" role="menu">--}}
{{--        <a class="cafe-tabs-target-link active" href="#euro-cafe" role="menuitem"--}}
{{--           aria-label="Отобразить меню европейской кухни">--}}
{{--            Европейская кухня--}}
{{--        </a>--}}
{{--        <a class="cafe-tabs-target-link" href="#national-cafe" role="menuitem"--}}
{{--           aria-label="Отобразить меню национальной кухни">--}}
{{--            Национальная кухня--}}
{{--        </a>--}}
{{--    </nav>--}}
{{--    <div class="cafe-tabs-body">--}}
{{--        <!-- Меню европейской кухни -->--}}
{{--        <div id="euro-cafe" class="cafe-tabs-block">--}}
{{--            <section class="menu-section">--}}
{{--                <h2 class="menu-section-title">Завтраки</h2>--}}
{{--                <div class="menu-section-image">--}}
{{--                    <picture>--}}
{{--                        <source srcset="dist/img/cafe/hamburger.png" media="(min-width: 992px)">--}}
{{--                        <img src="dist/img/cafe/hamburger.png" height="137" width="200" alt="">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <ul class="menu-section-items">--}}
{{--                    <li class="menu-section-item">--}}
{{--                        <div class="menu-section-item-block-desc">--}}
{{--                            <h3 class="menu-section-item-block-desc-title">Завтрак 1. Яичница с сосиской--}}
{{--                                на Бородинском--}}
{{--                                хлебе</h3>--}}
{{--                            <p class="menu-section-item-block-desc-text">чай, кофе (на выбор), сыр,--}}
{{--                                сливочное масло</p>--}}
{{--                        </div>--}}
{{--                        <div class="menu-section-item-block-price">--}}
{{--                            <p class="menu-section-item-block-price-value" data-currency="Р">250</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </section>--}}
{{--        </div>--}}

{{--        <!-- Меню национальной кухни -->--}}
{{--        <div id="national-cafe" class="cafe-tabs-block witch-image">--}}
{{--            <div class="cafe-tabs-block-info">--}}
{{--                <img src="dist/img/cafe/image_dinner_optimize.jpg" height="167" width="290"--}}
{{--                     alt="Бутерброды">--}}
{{--                <p class="cafe-tabs-block-info-text">--}}
{{--                    Национальные блюда хакасской кухни готовим по предварительным заказам--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <section class="menu-section">--}}
{{--                <h2 class="menu-section-title">Блюда Хакасской кухни</h2>--}}
{{--                <div class="menu-section-image">--}}
{{--                    <picture>--}}
{{--                        <source srcset="dist/img/cafe/hamburger.png" media="(min-width: 992px)">--}}
{{--                        <img src="dist/img/cafe/hamburger.png" height="137" width="200" alt="">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <ul class="menu-section-items">--}}
{{--                    <li class="menu-section-item">--}}
{{--                        <div class="menu-section-item-block-desc">--}}
{{--                            <h3 class="menu-section-item-block-desc-title">Завтрак 1. Яичница с сосиской--}}
{{--                                на Бородинском--}}
{{--                                хлебе</h3>--}}
{{--                            <p class="menu-section-item-block-desc-text">чай, кофе (на выбор), сыр,--}}
{{--                                сливочное--}}
{{--                                масло</p>--}}
{{--                        </div>--}}
{{--                        <div class="menu-section-item-block-price">--}}
{{--                            <p class="menu-section-item-price-value" data-currency="Р">250</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
{{--</div>--}}
