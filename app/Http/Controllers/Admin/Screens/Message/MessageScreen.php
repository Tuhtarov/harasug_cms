<?php

namespace App\Http\Controllers\Admin\Screens\Message;

use App\Helpers\Dev;
use App\Models\CafeRecord;
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


class MessageScreen
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

    public static function index(LengthAwarePaginator $messages, bool $onlyTrashed = false)
    {
        //создаём экземлпяр CafeScreen
        $screen = new self();

        $screen->form->template('table-list')->source([
            'messages' => $messages
        ]);

        $screen->form->title = $onlyTrashed == false ? 'Соообщения посетителей' : 'Удалённые соообщения посетителей';
        $screen->form->isModelExists = false;

        $screen->form->addField(
            TableField::make('name', 'Имя')
        );

        $screen->form->addField(
            TableField::make('message', 'Сообщение')
        );

        $screen->form->addField(
            TableField::make('phone', 'Телефон')
        );

        $screen->form->addField(
            TableField::make('email', 'Email')
        );

        $screen->form->addField(
            TableField::make('created_at', 'Дата отправки')
        );

        if ($onlyTrashed == true) {
            $screen->form->buttons([
                Link::make('Показать не удалённые')->route('admin.message.index')->class('button')
            ]);
        } else {
            $screen->form->buttons([
                Link::make('Показать удалённые')->route('admin.message.index.trashed')->class('button')
            ]);
        }


        $screen->form->addField(
            TableField::make('', '')
                ->link(function ($model) {
                    if (!$model->trashed()) {
                        echo Link::make('Удалить')->route('admin.message.delete', ['id' => $model->id])->render();
                    } else {
                        echo Link::make('Восстановить')->route('admin.message.restore', ['id' => $model->id])->render();
                    }
                })
        );

        $screen->form->build();
        $screen->form->render();
    }
}
