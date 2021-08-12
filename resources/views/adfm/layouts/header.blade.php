<div class="header-body">
    <div class="header-body-navigation @if($page->slug == 'cafe' || $page->title == 'Меню кафе' || $page->title == 'Кафе'){{'dont-move'}}@endif">
        <nav class="header-info-bar">
            <ul class="bar-tel-items">
                <li><a href="tel:+79832550535">+7 (983) 255 05 35</a></li>
                <li><a href="tel:+79832550545">+7 (983) 255 05 45</a></li>
                <li><a href="tel:+79235901001">+7 (923) 590 10 01</a></li>
            </ul>
            <div class="bar-user-menu">
                <p class="bar-info">Бронирование<br>с 9:00 до 21:00</p>
                <a class="bar-btn-phone-order" href="#">Заказать звонок</a>
            </div>
        </nav>
        <aside class="header-navigation">
            <div class="header-navigation-lang">
                <input class="header-navigation-lang-control vh" id="current_lang" type="checkbox"
                       name="current">
                <label class="header-navigation-lang-current" for="current_lang">RU</label>
                <ul class="header-navigation-lang-items">
                    <li class="header-navigation-lang-item current">
                        <label>RU
                            <input checked class="vh" type="radio" name="lang">
                        </label>
                    </li>
                    <li class="header-navigation-lang-item">
                        <label>ENG
                            <input class="vh" type="radio" name="lang">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="header-navigation-main-wrapper">
                <a href="#my-menu" class="header-navigation-mobile-burger" aria-label="Навигационное меню">
                    <span></span>
                </a>
                <nav id="my-menu">
                    <ul class="header-navigation-list">
                        <li @if($page->slug=="index" || $_SERVER['REQUEST_URI'] == '/'){{'class=arrow-current-page'}}@endif>
                            <a href="/">главная</a></li>
                        <li @if($page->slug=="cafe"){{'class=arrow-current-page'}}@endif><a href="cafe">кафе</a></li>
                        <li @if($page->slug=="gallery"){{'class=arrow-current-page'}}@endif><a
                                href="gallery">галерея</a></li>
                        <li @if($page->slug=="chill"){{'class=arrow-current-page'}}@endif><a href="chill">отдых</a></li>
                        <li @if($page->slug=="reservation"){{'class=arrow-current-page'}}@endif><a href="reservation">бронирование</a>
                        </li>
                        <li @if($page->slug=="contacts"){{'class=arrow-current-page'}}@endif><a
                                href="contacts">контакты</a></li>
                        <li @if($page->slug=="news"){{'class=arrow-current-page'}}@endif><a href="news">новости</a></li>
                        <li @if($page->slug=="comments"){{'class=arrow-current-page'}}@endif><a
                                href="comments">отзывы</a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="header-body-main wrapper">
            <section class="header-about">
                <div class="header-logo-container">
                    <img src="{{asset('dist/img/icon/logo.svg')}}" alt="Логотип 'Хара Суг'" height="185"
                         width="185">
                </div>
                @if($page->slug == "cafe")
                    <h1 class="header-about-title">Кафе «Хара Суг»</h1>
                    <ul class="header-about-list">
                        <li>европейская кухня</li>
                        <li>национальная кухня</li>
                        <li>проведение банкетов и корпоративов</li>
                    </ul>
                @else
                    <h1 class="header-about-title">Хакасский этно-культурный парк<br>«Хара Суг»</h1>
                    <div class="header-about-text">
                        <p>Уникальная база отдыха, отдых и услуги в благоустроенных юртах.
                            Край удивительной природы и древней культуры. Целебный сибирский воздух,
                            удивительные озера, ресторан сибирской кухни, баня, бассейн.
                            Подойдёт как для семейного отдыха, так и для проведения корпоративных мероприятий.
                        </p>
                    </div>
                @endif
            </section>
        </div>
        <div class="header-background">
            <picture class="header-background-picture">
                @if($page->slug == "cafe")
                    <source srcset="{{asset('dist/img/bg/header_cafe_bg_webp.webp')}}" type="image/webp">
                    <img src="{{asset('dist/img/bg/header_cafe_bg_jpg.jpg')}}" alt="" width="2048" height="1080">
                @else
                    <source srcset="{{asset('dist/img/bg/header_bg_webp.webp')}}" type="image/webp">
                    <source srcset="{{asset('dist/img/bg/header_bg_jpg.jpg')}}" type="image/jpeg">
                    <img src="{{asset('dist/img/bg/header_bg_jpg.jpg')}}" alt="Горы Хакасии" width="2048"
                         height="1080">
                @endif
            </picture>
        </div>
    </div>
    <div class="header-body-form wrapper">
        <div class="header-form @if($page->slug == "cafe"){{"for-cafe"}}@endif">
            @if($page->slug == "cafe")
                <button class="primary-btn cafe-header-btn" type="button" aria-label="Заказ банкета">Заказать
                    банкет
                </button>
            @else
                <form class="primary-form" action="#" method="GET">
                    <div class="primary-form-row">
                        <div class="primary-control">
                            <input class="primary-control-backend vh" type="text" name="check[date_arrival]"
                                   value="">
                            <input id="date_arrival" class="primary-control-control vh"
                                   aria-label="Выбор количества взрослых" type="checkbox">
                            <label for="date_arrival" class="primary-control-datepicker icon calendar">Заезд
                                01/05/2020</label>
                            <div class="primary-control-datepicker-body"></div>
                        </div>
                        <div class="primary-control">
                            <input class="primary-control-backend vh" type="text" name="check[date_leaving]"
                                   value="">
                            <input id="date_leaving" class="primary-control-control vh"
                                   aria-label="Выбор количества взрослых" type="checkbox">
                            <label for="date_leaving" class="primary-control-datepicker icon calendar">Отъезд
                                01/05/2020</label>
                            <div class="primary-control-datepicker-body"></div>
                        </div>
                        <div class="primary-control">
                            <input class="primary-control-backend vh" type="text" name="check[qty_adult]">
                            <input class="primary-control-control vh" id="adult_select"
                                   aria-label="Выбор количества взрослых" type="checkbox">
                            <label class="primary-control-select icon people" for="adult_select"></label>
                            <ul class="primary-control-items">
                                <li class="primary-control-item" data-before="Взрослых">1</li>
                                <li class="primary-control-item current" data-before="Взрослых">2</li>
                                <li class="primary-control-item" data-before="Взрослых">3</li>
                            </ul>
                        </div>
                        <div class="primary-control">
                            <input class="primary-control-backend vh" type="text" name="check[qty_child]">
                            <input id="child_select" class="primary-control-control vh"
                                   aria-label="Выбор количества детей" type="checkbox">
                            <label for="child_select" class="primary-control-select icon people"></label>
                            <ul class="primary-control-items">
                                <li class="primary-control-item" data-before="Детей">1</li>
                                <li class="primary-control-item current" data-before="Детей">2</li>
                                <li class="primary-control-item" data-before="Детей">3</li>
                            </ul>
                        </div>
                    </div>
                    <button class="primary-btn" type="submit"
                            aria-label="Проверка наличия свободных дат для заезда">Проверить
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
