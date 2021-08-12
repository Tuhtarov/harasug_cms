<section class="section-form-label">
    <div class="wrapper">
        <div class="inner-form">
            <h2>Проверьте наличие сводобных дат для заезда</h2>
            <form class="primary-form" action="#" method="GET">
                <div class="primary-form-row">
                    <div class="primary-control">
                        <input class="primary-control-backend vh" type="text" name="check[date_arrival]"
                               value="">
                        <input id="date_arrival_index" class="primary-control-control vh"
                               aria-label="Выбор количества взрослых" type="checkbox">
                        <label for="date_arrival_index" class="primary-control-datepicker icon calendar">Заезд
                            01/05/2020</label>
                        <div class="primary-control-datepicker-body"></div>
                    </div>
                    <div class="primary-control">
                        <input class="primary-control-backend vh" type="text" name="check[date_leaving]"
                               value="">
                        <input id="date_leaving_index" class="primary-control-control vh"
                               aria-label="Выбор количества взрослых" type="checkbox">
                        <label for="date_leaving_index" class="primary-control-datepicker icon calendar">Отъезд
                            01/05/2020</label>
                        <div class="primary-control-datepicker-body"></div>
                    </div>
                    <div class="primary-control">
                        <input class="primary-control-backend vh" type="text" name="check[qty_adult]">
                        <input class="primary-control-control vh" id="adult_select_index"
                               aria-label="Выбор количества взрослых" type="checkbox">
                        <label class="primary-control-select icon people" for="adult_select_index"></label>
                        <ul class="primary-control-items">
                            <li class="primary-control-item" data-before="Взрослых">1</li>
                            <li class="primary-control-item current" data-before="Взрослых">2</li>
                            <li class="primary-control-item" data-before="Взрослых">3</li>
                        </ul>
                    </div>
                    <div class="primary-control">
                        <input class="primary-control-backend vh" type="text" name="check[qty_child]">
                        <input id="child_select_index" class="primary-control-control vh"
                               aria-label="Выбор количества детей" type="checkbox">
                        <label for="child_select_index" class="primary-control-select icon people"></label>
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
        </div>
    </div>
</section>
