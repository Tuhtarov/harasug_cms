<div class="footer-background">
    <picture class="footer-background-picture">
        <source srcset="{{(asset('dist/img/bg/header_bg_webp.webp'))}}" type="image/webp">
        <source srcset="{{asset('dist/img/bg/header_bg_jpg.jpg')}}" type="image/jpeg">
        <img src="{{asset('dist/img/bg/header_bg_jpg.jpg')}}" alt="" width="2048" height="1080">
    </picture>
</div>
<div class="wrapper">
    <div class="footer-main">
        <div class="footer-head">
            <a href="{{route('adfm.show.main-page')}}">
                <img class="footer-logo" src="{{asset('dist/img/icon/logo.svg')}}" alt="Логотип 'Хара Суг'"height="93" width="103">
            </a>
            <div class="footer-confidential-info">
                <p>&copy; 2020. Все права защищены.</p>
                <a href="#">Политика конфиденциальности.</a>
            </div>
        </div>

        <div class="footer-body">
            <ul class="footer-navigation-items">
                <li class="footer-navigation-item">
                    <ul class="footer-navigation-sublist">
                        <li>О нас</li>
                        <li><a href="{{route('gallery.index')}}">Галерея</a></li>
                        <li><a href="{{route('comment.index')}}">Отзывы</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </li>
                <li class="footer-navigation-item">
                    <ul class="footer-navigation-sublist">
                        <li>Услуги</li>
                        <li><a href="#">Проживание</a></li>
                        <li><a href="{{route('cafe.index')}}">Ресторан</a></li>
                        <li><a href="{{route('chill.index')}}">Отдых</a></li>
                    </ul>
                </li>
                <li class="footer-navigation-item">
                    <ul class="footer-navigation-sublist">
                        <li>Клиенту</li>
                        <li><a href="{{route('reservation.index')}}">Бронирование</a></li>
                        <li><a href="{{route('qa.index')}}">Вопрос-ответ</a></li>
                        <li><a href="#">Блог</a></li>
                    </ul>
                </li>
            </ul>
            <form class="subscribe-mail-form" action="#" method="POST">
                <input class="subscribe-mail-field" placeholder="e-mail" type="email"
                       aria-label="Подписка на рассылку. Введите адрес электронной почты.">
                <button class="primary-btn subscribe-mail-btn" type="button">Подписаться на
                    рассылку
                </button>
                <div class="footer-social-icons">
                    <a href="https://www.instagram.com/" class="social-icon inst"
                       aria-label="Наш instagram"></a>
                    <a href="https://vk.com/" class="social-icon vk" aria-label="Наш ВК"></a>
                    <a href="https://www.youtube.com/" class="social-icon youtube" aria-label="Наш youtube"></a>
                </div>
                <div class="subscribe-group-checkbox">
                    <input class="subscribe-mail-checkbox" id="check-personal-data" type="checkbox">
                    <label for="check-personal-data">
                        Даю согласие на обработку моих персональных данных. <br> (Не является публичной
                        офертой)
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
