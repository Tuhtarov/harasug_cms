<?php

namespace App\Http\Controllers\Admin\Screens\Comment;

use App\Helpers\Dev;
use App\Models\CafeRecord;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Wtolk\Crud\Form\Button;
use Wtolk\Crud\Form\Column;
use Wtolk\Crud\Form\Input;
use Wtolk\Crud\Form\Link;
use Wtolk\Crud\Form\SelectHarasug;
use Wtolk\Crud\Form\TableField;
use Wtolk\Crud\FormPresenter;


class CommentScreen
{
    public $form;
    public $request;

    public function __construct()
    {
        $this->form = new FormPresenter();
        $this->request = request();
    }

    public static function index(LengthAwarePaginator $comments, bool $onlyTrashed = false)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'comments' => $comments
        ]);

        $screen->form->title = $onlyTrashed == true ? 'Удалённые отзывы' : 'Отзывы';
        $screen->form->isModelExists = false;

        $screen->form->addField(
            TableField::make('username', 'Имя')
        );

        $screen->form->addField(
            TableField::make('message', 'Сообщение')
        );

        $screen->form->addField(
            TableField::make('email', 'Email')
        );

        $screen->form->addField(
            TableField::make('phone', 'Телефон')
        );

        $screen->form->addField(
            TableField::make('created_at', 'Дата отзыва')
        );

        $screen->form->addField(
            TableField::make('', 'Видимость на сайте')
            ->link(function (Comment $model) {
                if ($model->isConfirmed()) {
                    echo Link::make('Скрывать')->route('admin.comment.confirm-accept', ['id' => $model->id])->render();
                } else {
                    echo Link::make('Показывать')->route('admin.comment.confirm-cancel', ['id' => $model->id])->render();
                }
            })
        );

        if ($onlyTrashed == true) {
            $screen->form->buttons([
                Link::make('Показать не удалённые')->route('admin.comment.index')->class('button')
            ]);
        } else {
            $screen->form->buttons([
                Link::make('Показать удалённые')->route('admin.comment.index.trashed')->class('button')
            ]);
        }


        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.comment.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.comment.restore', ['id' => $model->id])->render();
                    }
                })
        );

        $screen->form->build();
        $screen->form->render();
    }
}
