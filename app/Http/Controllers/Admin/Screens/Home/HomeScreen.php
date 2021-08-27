<?php


namespace App\Http\Controllers\Admin\Screens\Home;


use App\Models\Home;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Whoops\Exception\ErrorException;
use Wtolk\Crud\Form\Checkbox;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Cropper;
use Wtolk\Crud\Form\DateTime;
use Wtolk\Crud\Form\File;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\Summernote;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\TextArea;
use Wtolk\Crud\FormPresenter;
use App\Models\Adfm\News;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Button;

class HomeScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();

    }

    public static function index(LengthAwarePaginator $homes)
    {
        $screen = new self();
        $screen->form->template('table-list')->source([
            'homes' => $homes
        ]);
        $screen->form->title = 'Юрты';

        $screen->form->addField(
            TableField::make('title', 'Краткий заголовок')
                ->link(function ($model) {
                    echo Link::make($model->title)->route('admin.home.edit', ['id' => $model->id])
                        ->render();
                })
        );

        $screen->form->addField(
            TableField::make('title_full', 'Полный заголовок')
                ->link(function ($model) {
                    echo Link::make($model->title_full)->route('admin.home.edit', ['id' => $model->id])
                        ->render();
                })
        );

        $screen->form->addField(TableField::make('price', 'Цена'));
        $screen->form->addField(TableField::make('max_peoples', 'Вместимость'));

        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    echo Link::make('Удалить')->route('admin.home.delete', ['id' => $model->id])->render();
                    echo Link::make('Восстановить')->route('admin.home.restore', ['id' => $model->id])->canSee($model->trashed())->render();
                })
        );

        $screen->form->buttons([
            Link::make('Добавить')->class('button')->icon('note')->route('admin.home.create')
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function create()
    {
        $screen = new self();
        $screen->form->isModelExists = false;
        $screen->form->template('form-edit')->source([
            'home' => new Home()
        ]);
        $screen->form->title = 'Создание новой юрты';
        $screen->form->route = route('admin.home.store');
        $screen->form->columns = self::getFields();
        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->route('admin.home.update')->submit(),
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(Home $model)
    {
        $screen = new self();
        $screen->form->isModelExists = true;
        $screen->form->template('form-edit')->source([
            'home' => $model
        ]);
        $screen->form->title = 'Редактирование юрты: ' . '"' . $model->title . '"';
        $screen->form->route = route('admin.home.update', $screen->form->source['home']->id);
        $screen->form->columns = self::getFields();
        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.home.delete')->canSee($screen->form->isModelExists),
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function getFields() {
        return [
            Column::make([
                Input::make('home.title')
                    ->title('Краткий заголовок (для карточек)')
                    ->required(),

                Input::make('home.title_full')
                    ->title('Полный заголовок')
                    ->required(),

                TextArea::make('home.description')->title('Описание'),

                Cropper::make('home.image')->title('Изображение (превью)'),
            ]),
            Column::make([
                Input::make('home.slug')
                    ->title('Вид в адресной строке')
                ->setDescription('* вид определяется автоматически'),

                SelectHarasug::make('home.status')
                    ->setCreateable(false)
                    ->setIsVipChoose(true)
                    ->title('Статус VIP'),

                Input::make('home.max_peoples')
                    ->title('Вместимость')
                    ->setType('number')
                    ->required(),

                Input::make('home.price')
                    ->title('Цена')
                    ->setType('number')
                    ->required(),

                Input::make('home.price_info')
                    ->title('Пояснение к цене')
                    ->setDescription('* по умолчанию: цена / ночь')
                    ->required(),
            ])->class('col col-md-4')
        ];
    }


}
