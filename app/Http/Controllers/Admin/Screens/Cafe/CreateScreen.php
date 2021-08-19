<?php

namespace App\Http\Controllers\Admin\Screens\Cafe;

use App\Helpers\Dev;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
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


class CreateScreen
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

    public static function index(array $categories, array $cafe_types)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        self::$selectize_cafe = $cafe_types;
        self::$selectize_categories = $categories;

        $screen->form->template('form-edit')->source([
            'cafe_records' => new CafeRecord()
        ]);;

        $screen->form->route = route('admin.cafe.store');
        $screen->form->title = 'Добавление блюда';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Добавить')->icon('save')->route('adfm.pages.update')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    private static function getFields()
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
                    ->required(),
                SelectHarasug::make('cafe_record.cafe_type_id')
                    ->title('Кухня')
                    ->setCreateable(false)
                    ->setOptions(self::$selectize_cafe)
                    ->defaultValue(self::$selectize_cafe[0]['id'])
                    ->required(),
            ])->class('col col-md-4'),
        ];
    }

}
