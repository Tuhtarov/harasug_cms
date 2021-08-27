<?php

namespace App\Http\Controllers\Admin\Screens\Cafe;

use App\Helpers\Dev;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\Select;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\FormPresenter;
use Wtolk\Crud\Form\Summernote;


class CategoryScreen
{
    public $form;
    public $request;

    private static array $selectize_cafe;
    private static array $selectize_categories;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }


    public static function index(LengthAwarePaginator $model)
    {
        $screen = new self();
        $screen->form->template('table-list')->source([
            'cafe_categories' => $model
        ]);
        $screen->form->title = 'Список категорий';

        $screen->form->addField(
            TableField::make('name', 'Наименование')
                ->link(function ($model) {
                    echo Link::make($model->name)->route('admin.cafe.category.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->addField(
            TableField::make('cafe_name', 'Кухня')
        );

        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.cafe.category.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.cafe.category.restore', ['id' => $model->id])->render();
                    }
                })
        );

        $screen->form->buttons([
            Link::make('Добавить')->class('button')->icon('note')->route('admin.cafe.category.create')
        ]);

        $screen->form->build();
        $screen->form->render();
    }


    public static function create(array $cafe_types)
    {
        $screen = new self();

        self::$selectize_cafe = $cafe_types;

        $screen->form->template('form-edit')->source([
            'cafe_category' => new CafeCategory()
        ]);

        $screen->form->route = route('admin.cafe.category.store');
        $screen->form->title = 'Создание категории';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(CafeCategory $model, array $cafe_types)
    {
        $screen = new self();

        $screen->form->isModelExists = true;

        self::$selectize_cafe = $cafe_types;

        $screen->form->template('form-edit')->source([
            'cafe_category' => $model
        ]);;
        $screen->form->title = 'Редактирование категории: ' . '"' . $model->name . '"';

        $screen->form->route = route('admin.cafe.category.store');


        $screen->form->columns = self::getFields($model->cafe_type_id);

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.cafe.category.delete')->canSee($screen->form->isModelExists),
        ]);

        $screen->form->build();
        $screen->form->render();
    }


    private static function getFields(int $cafe_type_id = null)
    {
        return [
            Column::make([
                SelectHarasug::make('cafe_category.cafe_type_id')
                    ->title('Кухня')
                    ->setCreateable(false)
                    ->setOptions(self::$selectize_cafe)
                    ->defaultValue($cafe_type_id != null ? $cafe_type_id : self::$selectize_cafe[0]['id'])
                    ->required(),
                Input::make('cafe_category.name')
                    ->title('Имя категории')
                    ->required(),
            ])->class('col col-md-6'),
        ];
    }
}
