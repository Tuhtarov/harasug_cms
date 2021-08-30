<?php

namespace App\Http\Controllers\Admin\Screens\Reservation;

use App\Helpers\Dev;
use App\Models\AboutCard;
use App\Models\Adfm\Page;
use App\Models\CafeRecord;
use App\Models\Home;
use App\Models\QuestionAnswer;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\Checkbox;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\DateHarasug;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\Select;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\TextArea;
use Wtolk\Crud\Form\TinyMCE;
use Wtolk\Crud\FormPresenter;


class ReservationScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    /**
     * @param LengthAwarePaginator $reservation
     * @param string|null $title
     */
    public static function index(LengthAwarePaginator $reservation, string $title = null, bool $onlyTrashed = false)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'reservation' => $reservation
        ]);

        $screen->form->title = $title ?? 'Бронирование';

        $screen->form->addField(
            TableField::make('name', 'Имя клиента')
        );

        $screen->form->addField(
            TableField::make('phone', 'Телефон клиента')
        );

        $screen->form->addField(
            TableField::make('home_title', 'Юрта')
        );

        $screen->form->addField(
            TableField::make('time_in', 'Заезд')
        );

        $screen->form->addField(
            TableField::make('time_out', 'Отъезд')
        );

        $screen->form->addField(
            TableField::make('qty_old', 'Взрослые')
        );

        $screen->form->addField(
            TableField::make('qty_child', 'Дети')
        );

        if ($screen->form->title != 'История') {
            $screen->form->addField(
                TableField::make('', 'Статус бронирования')
                    ->link(function (Reservation $model) {
                        if (!$model->is_confirmed && !$model->trashed()) {
                            echo Link::make('Подтвердить')->route('admin.reservation.confirm-accept',
                                ['id' => $model->id])->render();
                        } else {
                            if ($model->is_confirmed && !$model->trashed()) {
                                echo Link::make('Отменить бронь')->route('admin.reservation.confirm-cancel',
                                    ['id' => $model->id])->render();
                            }
                        }
                    })
            );
        }

        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if ($model->trashed()) {
                        echo Link::make('Восстановить')->route('admin.reservation.restore',
                            ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Удалить')->route('admin.reservation.delete', ['id' => $model->id])->render();
                    }
                })
        );

        if ($onlyTrashed) {
            $screen->form->buttons([
                Link::make('Показать не удалённые')->route('admin.reservation.index-history')->class('button')
            ]);
        } else {
            if ($screen->form->title == 'Новые заявки') {
                $screen->form->buttons([
                    Link::make('Добавить бронь')->route('admin.reservation.create')->class('button'),
                ]);
            } else {
                $screen->form->buttons([
                    Link::make('Добавить бронь')->route('admin.reservation.create')->class('button'),
                    Link::make('Показать удалённое')->route('admin.reservation.index-history.trashed')->class('button')
                ]);
            }
        }

        $screen->form->build();
        $screen->form->render();
    }

    public static function create()
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'reservation' => new Reservation()
        ]);

        $screen->form->route = route('admin.reservation.store');
        $screen->form->title = 'Бронирование';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(Reservation $model)
    {
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'reservation' => $model
        ]);

        $screen->form->isModelExists = true;
        $screen->form->title = 'Редактирование бронирования';


        $screen->form->route = route('admin.reservation.update', $model->id);

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('save')->route('admin.qa.delete')->canSee($screen->form->isModelExists),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    private static function getFields()
    {
        return [
            Column::make([
                Input::make('reservation.name')
                    ->title('Имя клиента')
                    ->required(),
                Input::make('reservation.phone')
                    ->title('Телефон клиента')
                    ->required(),
                Input::make('reservation.qty_old')
                    ->title('Количество взрослых')
                    ->setType('number')
                    ->defaultValue(1)
                    ->setMinValue(1)
                    ->required(),
                Input::make('reservation.qty_child')
                    ->title('Количество детей')
                    ->setType('number')
                    ->setMinValue(0)
                    ->defaultValue(0),
            ])->class('col col-md-4'),
            Column::make([
                SelectHarasug::make('reservation.home_id')
                    ->title('Юрта')
                    ->setOptions(Home::all()->toArray())
                    ->required(),
                DateHarasug::make('reservation.time_in')
                    ->title('Дата заезда')
                    ->required(),
                DateHarasug::make('reservation.time_out')
                    ->title('Дата отъезда')
                    ->required(),
            ])->class('col col-md-4')
        ];
    }

}
