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
            {{--        people--}}
            <label style="font-size: inherit">Количество взрослых: {{$data['qty_old']}} <br>
                <input class="primary-field" style="margin: 5px 0" type="hidden" name="book[qty_old]" readonly required
                       value="{{$data['qty_old']}}">
            </label>
            <br>
            <label style="font-size: inherit">Количество детей: {{$data['qty_child']}} <br>
                <input class="primary-field" style="margin: 5px 0" type="hidden" name="book[qty_child]" readonly
                       required
                       value="{{$data['qty_child']}}">
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
            <label>Введите своё имя <br>
                <input name="book[name]" class="control-field" placeholder="Имя"
                       type="text" minlength="4" required aria-label="Поле для ввода имени"
                       value="{{old('book.name')}}">
            </label>
            <br>
            <br>
            <label>Введите свой телефон <br>
                <input name="book[phone]" class="control-field" placeholder="+7(000)-000-00-00"
                       type="tel" minlength="12" required maxlength="12" aria-label="Поле для ввода номера телефона"
                       value="{{old('book.phone')}}">
            </label>
        </div>
        <br>
        <div class="control-row" style="justify-content: start">
            <button class="control-btn primary-btn" style="margin-left: 0" type="submit">Подтвердить</button>
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
