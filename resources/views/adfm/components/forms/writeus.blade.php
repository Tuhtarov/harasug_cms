<form class="control-form" method="POST" action="#">
    <div class="control-row">
        <div class="control-column">
            <input name="message[name]" class="control-field" required placeholder="Имя"
                   type="text" aria-label="Поле для ввода имени">
            <input name="message[phone]" class="control-field" required placeholder="Телефон"
                   type="text" aria-label="Поле для ввода номера телефона">
            <input name="message[email]" class="control-field" required placeholder="E-mail"
                   type="text" aria-label="Поле для ввода электронной почты">
            <textarea name="message[message]" class="control-textarea" placeholder="Сообщение" rows="6" cols="12" required></textarea>
        </div>
        <div class="control-column flex-stretch">
            <div class="contacts-info flex-grow-1">
                <address class="contacts-info-address">Волоколамское шоссе, д. 17, офис 392</address>
                <ul class="contacts-info-phone-list">
                    <li><a href="tel:+79832550535">+7 (983) 255 05 35</a></li>
                    <li><a href="tel:+79832550545">+7 (983) 255 05 45</a></li>
                    <li><a href="tel:+79235901001">+7 (923) 590 10 01</a></li>
                </ul>
                <a class="contacts-info-mail" href="mailto:freia_2@mail.ru">freia_2@mail.ru</a>
            </div>
        </div>
    </div>
    <div class="control-column">
        <div class="control-checkbox-group">
            <input class="cb" id="cb_confirm" type="checkbox" required>
            <label for="cb_confirm">Я согласен, что информация, собранная этой формой, будет храниться в базе данных
                для обработки моего запроса. <br> В соответствии с «Общими правилами защиты данных» вы можете воспользоваться
                своим правом на доступ к вашим данным и исправить их с помощью контактной формы.</label>
        </div>
    </div>
    <div class="control-row">
        <button class="control-btn primary-btn" type="button">Отправить</button>
    </div>
</form>
