document.addEventListener('DOMContentLoaded', () => {
    //выбор языка
    let lang_items = document.querySelectorAll('.header-navigation-lang-item')
    let lang_current = document.querySelector('.header-navigation-lang-current')
    const lang_control = document.querySelector('.header-navigation-lang-control')

    //поля шапки
    const containers_control = document.querySelectorAll('.primary-control')
    const field_controls = document.querySelectorAll('.primary-control-control')


    lang_control.addEventListener('click', (e) => {
        document.querySelector('body').addEventListener('click', (e) => {
            if (e.target != lang_control && e.target != lang_current && e.target != lang_items) {
                lang_control.checked = false
            }
        })
    })

    lang_items.forEach(li => {
        li.addEventListener('click', () => {
            if (!li.classList.contains('current')) {
                lang_items.forEach(item => {
                    item.removeAttribute('checked')
                    item.classList.remove('current')
                })

                li.classList.add('current')
                li.setAttribute('checked', '')
                lang_current.textContent = li.innerText
            }
        })
    })

    //оживление полей шапки
    if(containers_control) {
        //установка дефолтных значений в поля
        containers_control.forEach(box => {
            //поля (для бэка и для пользователя)
            let field_backend = box.querySelector('.primary-control-backend')
            let field_input = box.querySelector('.primary-control-select')
            let field_items = box.querySelectorAll('.primary-control-item')

            //дефолтное значение (первое из списка)
            let current_item_value = ''
            let current_item_before = ""

            //если у списка есть элементы, то записать в поля первые значения
            if(field_items.length > 0) {
                for (let i = 0; i < field_items.length; i++) {
                    if(i === 0) {
                        field_items[i].classList.add('current')
                        current_item_value = field_items[i].innerText
                        current_item_before = field_items[i].getAttribute('data-before')
                    } else {
                        field_items[i].classList.remove('current')
                    }
                }
                //если поля в боксе (контейнере для полей) существуют, то записать в них первое значение
                if(field_backend !== null && field_backend !== undefined) {
                    field_backend.setAttribute('value', current_item_value)
                }
                if(field_input !== null && field_input !== undefined) {
                    field_input.textContent = current_item_before + " " + current_item_value
                }
            }
        })
    }

    document.addEventListener('click', function (event) {
        //закрытие активных полей со списком
        //если таргет === поле со списком, то закрываем все поля со списком, кроме кликнутого
        if(event.target.classList) {
            field_controls.forEach(control => {
                if(control != event.target) {
                    control.checked = false
                }
            })
        }

        if(event.target.checked) {
            document.querySelector('main').classList.add('blocked')
        } else {
            document.querySelector('main').classList.remove('blocked')
        }

        //проверка на нажатие элемента списка, если элемент списка был нажат, обрабатываем
        if (!event.target.classList.contains('primary-control-item')) return;
        if (event.target.classList.contains('current')) return;

        //убираем "current" у всех элементов списка
        let parent_listbox_items = event.target.parentElement.children
        for (let i = 0; i < parent_listbox_items.length; i++) {
            parent_listbox_items[i].classList.remove('current')
        }

        //добавляем "current" на кликнутый элемент списка
        event.target.classList.add('current')

        //переносим значение из списка в видимое поле
        let control_box = event.target.parentElement
        let field = control_box.parentElement.querySelector('.primary-control-select')
        let field_control = control_box.parentElement.querySelector('.primary-control-control')
        field.textContent = event.target.getAttribute('data-before') + " " + event.target.innerText

        //переносим выбранное значение из списка в скрытое поле для отправки на сервер
        let field_backend = control_box.parentElement.querySelector('.primary-control-backend')
        field_backend.setAttribute('value', event.target.innerText)
        field_control.checked = false
    });
})
