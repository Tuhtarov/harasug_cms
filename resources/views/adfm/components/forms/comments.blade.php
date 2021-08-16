{{--@error()--}}
{{--    <div>--}}
{{--        <ul style="background: black; padding: 5px">--}}
{{--            <li style="margin-top: 5px; color: white"></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@enderror--}}
<form class="control-form" method="POST" action="{{route('comment.create')}}">
    @csrf
    <div class="control-column">
        <input name="comment[username]" class="control-field" required placeholder="Имя"
               type="text" minlength="5" aria-label="Поле для ввода имени" value="{{old('comment.username')}}">
        <input name="comment[phone]" class="control-field" required placeholder="Телефон"
               type="tel" minlength="12" maxlength="12" aria-label="Поле для ввода номера телефона" value="{{old('comment.phone')}}">
        <input name="comment[email]" class="control-field" required placeholder="E-mail"
               type="email" minlength="3" maxlength="254" aria-label="Поле для ввода электронной почты" value="{{old('comment.email')}}">
    </div>
    <div class="control-column">
        <textarea name="comment[message]" class="control-textarea" minlength="15" placeholder="Отзыв" rows="6" cols="12"
                  aria-label="Ваш отзыв" required>{{old('comment.message')}}</textarea>
    </div>
    <div class="control-row checkbox">
        <div class="control-checkbox-group">
            <input class="cb" id="cb_confirm" type="checkbox" required>
            <label for="cb_confirm">Я согласен, что информация, собранная этой формой, будет храниться в базе данных
                для обработки моего запроса. <br> В соответствии с «Общими правилами защиты данных» вы можете
                воспользоваться
                своим правом на доступ к вашим данным и исправить их с помощью контактной формы.</label>
        </div>
    </div>
    <div class="control-row">
        <button class="control-btn primary-btn" type="submit">Отправить</button>
    </div>
</form>
