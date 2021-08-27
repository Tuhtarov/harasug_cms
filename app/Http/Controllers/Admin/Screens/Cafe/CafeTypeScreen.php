<?php

namespace App\Http\Controllers\Admin\Screens\Cafe;

use App\Helpers\Dev;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
use Illuminate\Database\Eloquent\Model;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\Select;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\TextArea;
use Wtolk\Crud\FormPresenter;
use Wtolk\Crud\Form\Summernote;


class CafeTypeScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index($cafe_types)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'cafe_types' => $cafe_types
        ]);
        $screen->form->title = 'Кухни';

        $screen->form->addField(
            TableField::make('name', 'Наименование')
                ->link(function ($model) {
                    echo Link::make($model->name)->route('admin.cafe.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->addField(
            TableField::make('message', 'Оповещение на баннере')
        );

        $screen->form->buttons([
            link::make('Добавить блюдо')->route('admin.cafe.record.create')->class('button')
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(CafeType $model)
    {
        $screen = new self();

        $screen->form->isModelExists = true;

        $screen->form->template('form-edit')->source([
            'cafe_type' => $model
        ]);
        $screen->form->route = route('admin.cafe.update', ['id' => $screen->form->source['cafe_type']->id]);

        $screen->form->title = 'Редактирование кухни: ' . '"' . $model->name . '"';
        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->class('button')->submit()
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    private static function getFields()
    {
        return [
            Column::make([
                TextArea::make('cafe_type.message')
                    ->title('Оповещение на баннере')
                    ->setDescription('* необязательное поле'),
                Input::make('cafe_type.image')
                    ->title('Изображение баннера')
                    ->setDescription('* необязательное поле'),
            ])->class('col col-md-6'),
        ];
    }

}
