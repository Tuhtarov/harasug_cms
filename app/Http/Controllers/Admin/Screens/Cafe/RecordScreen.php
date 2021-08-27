<?php

namespace App\Http\Controllers\Admin\Screens\Cafe;

use App\Helpers\Dev;
use App\Models\CafeRecord;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\FormPresenter;


class RecordScreen
{
    public $form;
    public $request;

    private static array $selectize_categories;
    private static array $selectize_cafe;

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

        $screen->form->addField(
            TableField::make('title', 'Наименование')
                ->link(function ($model) {
                    echo Link::make($model->title)->route('admin.cafe.record.edit', ['id' => $model->id])
                        ->render();
                })
        );

        $screen->form->addField(
            TableField::make('description', 'Описание')
        );

        $screen->form->addField(
            TableField::make('price', 'Цена')
        );

        $screen->form->addField(
            TableField::make('weight', 'Вес')
        );

        $screen->form->addField(
            TableField::make('cafe_category_name', 'Категория')
        );

        //КОЛОНКА УДАЛЕНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.cafe.record.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.cafe.record.restore',
                            ['id' => $model->id])->render();
                    }
                })
        );

        $screen->form->buttons([
            link::make('Добавить блюдо')->route('admin.cafe.record.create')->class('button')
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function create(array $categories, array $cafe_types)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        self::$selectize_cafe = $cafe_types;
        self::$selectize_categories = $categories;

        $screen->form->template('form-edit')->source([
            'cafe_records' => new CafeRecord()
        ]);;

        $screen->form->route = route('admin.cafe.record.store');
        $screen->form->title = 'Создание нового блюда';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(CafeRecord $model, array $categories, array $cafe_types)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();
        $screen->form->isModelExists = true;

        self::$selectize_cafe = $cafe_types;
        self::$selectize_categories = $categories;

        $screen->form->template('form-edit')->source([
            'cafe_record' => $model
        ]);
        $screen->form->title = 'Редактирование блюда: ' . '"' . $model->title . '"';


        $screen->form->route = route('admin.cafe.record.update', $model->id);

        $screen->form->columns = self::getFields(
            $model->cafe_category_id,
            $model->cafe_type_id
        );

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.cafe.record.delete')->canSee($screen->form->isModelExists),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    /**
     * Аргументы нужны для того, что бы явно указать, какую категорию или
     * какой тип кафе отобразить в качестве значения по умолчанию в выпадающем списке.
     * @param int|null $category_id
     * @param int|null $cafe_type_id
     * @return array
     */
    private static function getFields(int $category_id = null, int $cafe_type_id = null)
    {
        return [
            Column::make([
                Input::make('cafe_record.title')
                    ->title('Наименование')
                    ->required(),
                Input::make('cafe_record.description')
                    ->title('Описание')
                    ->setDescription('* необязательное поле'),
                Input::make('cafe_record.price')
                    ->title('Цена')
                    ->setType('number')
                    ->setMinValue('0')
                    ->setDescription('* необязательное поле'),
                Input::make('cafe_record.weight')
                    ->title('Вес')
                    ->placeholder('60 гр / 1 шт')
                    ->setDescription('* необязательное поле'),
            ])->class('col col-md-6'),

            Column::make([
                SelectHarasug::make('cafe_record.cafe_category')
                    ->title('Категория')
                    ->setOptions(self::$selectize_categories)
                    ->defaultValue($category_id != null ? $category_id : self::$selectize_categories[0]['id'])
                    ->required(),
                SelectHarasug::make('cafe_record.cafe_type_id')
                    ->title('Кухня')
                    ->setCreateable(false)
                    ->setOptions(self::$selectize_cafe)
                    ->defaultValue($cafe_type_id != null ? $cafe_type_id : self::$selectize_cafe[0]['id'])
                    ->required(),
            ])->class('col col-md-4'),
        ];
    }

}
