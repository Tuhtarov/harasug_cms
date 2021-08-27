<?php

namespace App\Http\Controllers\Admin\Screens\About;

use App\Helpers\Dev;
use App\Models\AboutCard;
use App\Models\Adfm\Page;
use App\Models\CafeRecord;
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


class AboutScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index(LengthAwarePaginator $aboutCards)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'about_cards' => $aboutCards
        ]);
        $screen->form->title = 'О нас';

        $screen->form->addField(
            TableField::make('title', 'Заголовок')
                ->link(function ($model) {
                    echo Link::make($model->title)->route('admin.about.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->addField(
            TableField::make('excerpt', 'Демонстрационный отрывок')
        );

        $screen->form->buttons([
           Link::make('Добавить')->route('admin.about.create')->class('button')
        ]);

        //КОЛОНКА УДАЛЕНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.about.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.about.restore',
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
            'about_card' => new AboutCard()
        ]);;

        $screen->form->route = route('admin.about.store');
        $screen->form->title = 'Создание нового поста: ' . ' "О нас"';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Добавить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(AboutCard $model)
    {
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'about_card' => $model
        ]);

        $screen->form->isModelExists = true;
        $screen->form->title = 'Редактирование поста: ' . '"' . $model->title . '"';


        $screen->form->route = route('admin.about.update', $model->id);

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
            Button::make('Удалить')->icon('trash')->route('admin.about.delete')->canSee($screen->form->isModelExists),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    private static function getFields()
    {
        return [
            Column::make([
                Input::make('about_card.title')
                    ->title('Заголовок')
                    ->required(),
                TextArea::make('about_card.excerpt')
                    ->title('Отрывок содержимого')
                    ->required(),
                TinyMCE::make('about_card.content')
                    ->title('Содержимое'),
            ]),
            Column::make([
                Input::make('about_card.slug')
                    ->title('Вид в адресной строке')
                    ->placeholder('пример: about-us'),
                Cropper::make('about_card.image')->title('Изображение (превью)'),
            ])->class('col col-md-4')
        ];
    }

}
