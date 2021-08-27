@include('adfm.layouts.listviews.errors')
<form class="control-form" method="post" action="{{route('reservation.booking')}}">
    @csrf
    <div class="control-column">
        <div style="font-size: 16px!important; border-color: #ffc300;">
            <input class="control-field" required type="hidden" value="{{$data['home_id']}}">
            <label style="font-size: inherit">Выбранная юрта: "{{$data['title']}}"<br>
                <input class="primary-field" style="margin: 5px 0" type="hidden" readonly name="book[home_id]"
                       required value="{{$data['home_id']}}">
            </label>

            <br>
            {{--        max_people--}}
            <label style="font-size: inherit">Выбранное количество мест: {{$data['max_peoples']}} <br>
                <input id="max_peoples" class="primary-field" style="margin: 5px 0" type="hidden"
                       name="book[max_peoples]"
                       value="{{$data['max_peoples']}}" readonly required>
            </label>
            <br>

            {{--        date --}}
            <label style="font-size: inherit">Дата заезда: {{$data['time_in']}}<br>
                <input class="primary-field" style="margin: 5px 0" type="hidden" name="book[time_in]" readonly required
                       value="{{$data['time_in']}}">
            </label>
            <br>
            <label style="font-size: inherit">Дата отъезда: {{$data['time_out']}}<br>
                <input class="primary-field" style="margin: 5px 0" type="hidden" name="book[time_out]" readonly required
                       value="{{$data['time_out']}}">
            </label>
        </div>
        <br>
        <div style="margin: auto 0">
            <br>
            {{--        people--}}
            <label style="font-size: inherit">Количество взрослых: <br>
                <input id="qty_old" class="control-field" min="1" max="{{$data['max_peoples']}}"
                       style="margin: 5px 0" type="number" name="book[qty_old]"
                        placeholder="0">
            </label>
            <br>
            <label style="font-size: inherit">Введите количество детей: <br>
                <input id="qty_child" class="control-field" style="margin: 5px 0"
                       min="0" placeholder="0"
                       {{--цифра 1 означает, что как минимум 1 взрослый должен занять одно место в бронировании--}}
                       max="{{$data['max_peoples'] - 1}}"
                       type="number" name="book[qty_child]">
            </label>
            <br>
            <label>Введите своё имя <br>
                <input name="book[name]" class="control-field" placeholder="Имя"
                       type="text" minlength="4" aria-label="Поле для ввода имени"
                       value="{{old('book.name')}}">
            </label>
            <br>
            <label>Введите свой телефон <br>
                <input name="book[phone]" class="control-field" placeholder="+7(000)-000-00-00"
                       type="tel" minlength="12" maxlength="12" aria-label="Поле для ввода номера телефона"
                       value="{{old('book.phone')}}">
            </label>
        </div>
        <br>
        <div class="control-row" style="justify-content: start">
            <button class="control-btn primary-btn" style="margin-left: 0"
                    id="buttonSendForm" type="submit">Подтвердить
            </button>
            <label for="buttonSendForm" id="warningForSendButton" style="display: block;
             width: 100%; color: red; opacity: 0">
                Количество людей не должно превышать {{$data['max_peoples']}}!
            </label>
        </div>
    </div>
    <div class="control-column">
        <div style="display: flex; justify-content: center">
            <img style="width: 100%; object-fit: cover; height: auto; max-height: 300px" src="{{$home['image']}}"
                 alt="Выбранная юрта {{$data['title']}}">
        </div>
        <br>
        <div>
            {{$home['description']}}
        </div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const field_old = document.querySelector('#qty_old')
        const field_child = document.querySelector('#qty_child')
        const max_qty = document.querySelector('#max_peoples')
        const buttonSendForm = document.querySelector('#buttonSendForm')
        const warningForSendButton = document.querySelector('#warningForSendButton')

        function checkFields() {
            let max = max_qty.getAttribute('value');
            let qty_child = field_child.value;
            let qty_old = field_old.value;

            let childIsValid = qty_child <= max - 1;

            console.log('child valid' + childIsValid)

            if ((max >= (qty_old + qty_child)) && qty_old != 0 && childIsValid !== false) {
                //если всё ок, блочим кнопку и выводим предупреждение
                buttonSendForm.removeAttribute('disabled')
                buttonSendForm.style.opacity = 1;
                warningForSendButton.style.opacity = 0;
            } else {
                buttonSendForm.setAttribute('disabled', null)
                buttonSendForm.style.opacity = 0.2;
                warningForSendButton.style.opacity = 1;
            }
        }

        field_child.addEventListener('input', function () {
            checkFields()
        })

        field_old.addEventListener('input', function () {
            checkFields()
        })

    })
</script>
