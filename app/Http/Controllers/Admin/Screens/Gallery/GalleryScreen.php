<?php

namespace App\Http\Controllers\Admin\Screens\Gallery;

use App\Helpers\Dev;
use App\Models\AboutCard;
use App\Models\Adfm\Page;
use App\Models\CafeRecord;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\Checkbox;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Cropper;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\TextArea;
use Wtolk\Crud\Form\TinyMCE;
use Wtolk\Crud\FormPresenter;


class GalleryScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index(LengthAwarePaginator $gallery)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'galleries' => $gallery
        ]);
        $screen->form->title = 'Галерея';

        $screen->form->addField(
            TableField::make('title', 'Заголовок')
                ->link(function ($model) {
                    echo Link::make($model->title)->route('admin.gallery.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->addField(
            TableField::make('created_at', 'Дата создания')
        );

        $screen->form->buttons([
            Link::make('Сохранить')->route('admin.gallery.create')->class('button')
        ]);

        //КОЛОНКА УДАЛЕНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.gallery.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.gallery.restore',
                            ['id' => $model->id])->render();
                    }
                })
        );

        $screen->form->build();
        $screen->form->render();
    }

    public static function create()
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'gallery' => new Gallery()
        ]);

        $screen->form->route = route('admin.gallery.store');
        $screen->form->title = "Создание новой галереи";

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(Gallery $model)
    {
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'gallery' => $model
        ]);

        $screen->form->isModelExists = true;
        $screen->form->title = 'Редактирование галереи: ' . '"' . $model->title . '"';


        $screen->form->route = route('admin.gallery.update', $model->id);

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.gallery.delete')->canSee($screen->form->isModelExists),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    private static function getFields()
    {
        return [
            Column::make([
                Input::make('gallery.title')
                    ->title('Заголовок')
                    ->required(),
                TinyMCE::make('gallery.content')
                    ->title('Содержимое'),
            ]),
            Column::make([
                Input::make('gallery.slug')
                    ->title('Вид в адресной строке')
                ->setDescription('* вид определяется автоматически'),
                Cropper::make('gallery.image')->title('Изображение (превью)'),
            ])->class('col col-md-4')
        ];
    }

}
