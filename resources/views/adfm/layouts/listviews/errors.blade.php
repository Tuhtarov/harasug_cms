<div class="control-row" style="justify-content: flex-start;">
    @if ($errors->any())
        <div style="background: #b0efff; padding: 10px; display: flex; width: 100%">
            <img src="{{asset('dist/img/icon/warning_ico.svg')}}" alt="" height="48" width="48"
                 style="margin: 6px 12px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="margin: 5px 0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
