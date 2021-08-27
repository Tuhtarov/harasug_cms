<?php


namespace App\Http\Controllers\Admin\Screens\Chill;


use App\Models\Chill;
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
use Wtolk\Crud\Form\Summernote;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\FormPresenter;
use App\Models\Adfm\News;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Button;

class ChillScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();

    }

    public static function index(LengthAwarePaginator $chills)
    {
        $screen = new self();
        $screen->form->template('table-list')->source([
            'chills' => $chills
        ]);
        $screen->form->title = 'Отдых';
        $screen->form->addField(
            TableField::make('title', 'Заголовок')
                ->link(function ($model) {
                    echo Link::make($model->title)->route('admin.chill.edit', ['id' => $model->id])
                        ->render();
                })
        );
        $screen->form->addField(TableField::make('created_at', 'Дата создания'));
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    echo Link::make('Удалить')->route('admin.chill.delete', ['id' => $model->id])->render();
                    echo Link::make('Восстановить')->route('admin.chill.restore', ['id' => $model->id])->canSee($model->trashed())->render();
                })
        );

        $screen->form->buttons([
            Link::make('Добавить')->class('button')->icon('note')->route('admin.chill.create')
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function create()
    {
        $screen = new self();
        $screen->form->isModelExists = false;
        $screen->form->template('form-edit')->source([
            'chill' => new Chill()
        ]);
        $screen->form->title = 'Создание новой записи';
        $screen->form->route = route('admin.chill.store');
        $screen->form->columns = self::getFields();
        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->route('admin.chill.update')->submit(),
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function edit($model)
    {
        $screen = new self();
        $screen->form->isModelExists = true;
        $screen->form->template('form-edit')->source([
            'chill' => $model
        ]);
        $screen->form->title = 'Редактирование записи: ' . '"' . $model->title . '"';
        $screen->form->route = route('admin.chill.update', $screen->form->source['chill']->id);
        $screen->form->columns = self::getFields();
        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->route('admin.chill.update')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.chill.delete')->canSee($screen->form->isModelExists),
        ]);
        $screen->form->build();
        $screen->form->render();
    }

    public static function getFields() {
        return [
            Column::make([
                Input::make('chill.title')
                    ->title('Заголовок')
                    ->required(),

                Summernote::make('chill.content')->title('Содержимое'),
            ]),
            Column::make([
                Input::make('chill.slug')
                    ->title('Вид в адресной строке')
                    ->setDescription('* вид определяется автоматически'),
                Cropper::make('chill.image')->title('Изображение (превью)'),

            ])->class('col col-md-4')
        ];
    }


}
