<?php

namespace App\Http\Controllers\Admin\Screens\Cafe;

use App\Models\Adfm\FeedbackMessage;
use App\Helpers\Dev;
use App\Models\CafeRecord;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\File;
use Wtolk\Crud\Form\InfoTable;
use Wtolk\Crud\Form\Summernote;
use Wtolk\Crud\FormPresenter;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Checkbox;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\Button;


class IndexScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index(string $cafeName, $cafeRecords)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'cafe_records' => $cafeRecords
        ]);
        $screen->form->title = $cafeName;

        //КОЛОНКА ИМЕНОВАНИЕ
        $screen->form->addField(
            TableField::make('title', 'Именование')
        );

        //КОЛОНКА ОПИСАНИЕ
        $screen->form->addField(
            TableField::make('description', 'Описание')
        );

        //КОЛОНКА ЦЕНА
        $screen->form->addField(
            TableField::make('price', 'Цена')
        );

        //КОЛОНКА ВЕС
        $screen->form->addField(
            TableField::make('weight', 'Вес')
        );

        //КОЛОНКА РЕДАКТИРОВАНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    echo Link::make('Изменить')->route('adfm.feedbacks.edit', ['id' => $model->id])->render();
                })
        );

        //КОЛОНКА УДАЛЕНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    echo Link::make('Удалить')->route('adfm.feedbacks.destroy', ['id' => $model->id])->render();
                })
        );

        $screen->form->build();
        $screen->form->render();
    }
}
