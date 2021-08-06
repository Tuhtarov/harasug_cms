<form class="control-form" method="POST" action="#">
    <div class="control-column">
        <input name="comment[name]" class="control-field" required placeholder="Имя"
               type="text" aria-label="Поле для ввода имени">
        <input name="comment[phone]" class="control-field" required placeholder="Телефон"
               type="text" aria-label="Поле для ввода номера телефона">
        <input name="comment[email]" class="control-field" required placeholder="E-mail"
               type="text" aria-label="Поле для ввода электронной почты">
    </div>
    <div class="control-column">
                                    <textarea name="comment[comment]" class="control-textarea" placeholder="Отзыв"
                                              rows="6" cols="12" required></textarea>
    </div>
    <div class="control-row checkbox">
        <div class="control-checkbox-group">
            <input class="cb" id="cb_confirm" type="checkbox" required>
            <label for="cb_confirm">Я согласен, что информация, собранная этой формой, будет
                храниться в базе данных
                для обработки моего запроса. <br> В соответствии с «Общими правилами защиты
                данных» вы можете воспользоваться
                своим правом на доступ к вашим данным и исправить их с помощью контактной
                формы.</label>
        </div>
    </div>
    <div class="control-row">
        <button class="control-btn primary-btn" type="button">Отправить</button>
    </div>
</form>
