<?php

namespace App\Http\Controllers\Admin\Screens\Qa;

use App\Helpers\Dev;
use App\Models\AboutCard;
use App\Models\Adfm\Page;
use App\Models\CafeRecord;
use App\Models\QuestionAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\Checkbox;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\MultiFile;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\Form\TextArea;
use Wtolk\Crud\Form\TinyMCE;
use Wtolk\Crud\FormPresenter;


class QaScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index(LengthAwarePaginator $qa)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'question_answer' => $qa
        ]);
        $screen->form->title = 'Вопросы - ответы';

        $screen->form->addField(
            TableField::make('question', 'Вопрос')
                ->link(function ($model) {
                    echo Link::make($model->question)->route('admin.qa.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->addField(
            TableField::make('answer', 'Ответ')
                ->link(function ($model) {
                    echo Link::make($model->answer)->route('admin.qa.edit', ['id' => $model->id])->render();
                })
        );

        $screen->form->buttons([
            Link::make('Добавить')->route('admin.qa.create')->class('button')
        ]);

        //КОЛОНКА УДАЛЕНИЯ
        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.qa.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.qa.restore',
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
            'question_answer' => new AboutCard()
        ]);

        $screen->form->route = route('admin.qa.store');
        $screen->form->title = 'Создание нового ответа';

        $screen->form->columns = self::getFields();

        $screen->form->buttons([
            Button::make('Сохранить')->icon('save')->submit(),
        ]);

        $screen->form->build();
        $screen->form->render();
    }

    public static function edit(QuestionAnswer $model)
    {
        $screen = new self();

        $screen->form->template('form-edit')->source([
            'question_answer' => $model
        ]);

        $screen->form->isModelExists = true;
        $screen->form->title = 'Редактирование ответа';


        $screen->form->route = route('admin.qa.update', $model->id);

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
                TextArea::make('question_answer.question')
                    ->title('Вопрос')
                    ->required(),
                TextArea::make('question_answer.answer')
                    ->title('Ответ')
                    ->required(),
            ])->class('col col-md-4')
        ];
    }

}
