<?php

namespace App\Services\Feedback;

use App\Contracts\Feedback\CommentInterface;
use App\Models\Comment;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentService implements CommentInterface
{
    private Collection $comments;

    /**
     * Описывает режимы заполнения коллекции comments.
     * Возможные значения аргумента:
     *
     * 1. public - опубликованные и не удалённые;
     * 2. admin - всё, включая удалённые и не опубликованные;
     * 3. trashed - только удалённые;
     * 4. no_published - только не опубликованные;
     */
    private function initVariable(string $mode = 'public')
    {
        switch ($mode) {
            case 'public':
                $this->comments = Comment::with(['phone', 'email'])
                    ->where('is_published', '=', true)->get()->collect();
                break;
            case 'admin':
                $this->comments = Comment::withTrashed()
                    ->with(['phone', 'email'])->get()->collect();
                break;
            case 'trashed':
                $this->comments = Comment::onlyTrashed()
                    ->with(['phone', 'email'])->get()->collect();
                break;
            case 'no_published':
                $this->comments = Comment::with(['phone', 'email'])
                    ->where('is_published', '=', false)->get()->collect();
                break;
            default:
                $this->comments = Comment::with(['phone', 'email'])->get()->collect();
        }
    }

    public function getComments(string $mode = 'public'): Collection
    {
        $this->initVariable($mode);
        return $this->comments;
    }

    public function createComment(array $comment, array $contacts): bool
    {
        //если сохраняемый комментарий не валиден, возвращаем false
        if ($this->validateCommentOnInput($comment, $contacts) == false) {
            return false;
        }

        //инициализурем коллекцию имеющихся комментариев
        $this->initVariable('admin');

        //если в БД уже есть почта и номер телефона, то возвращаем false
        if ($this->checkPhoneAndEmailInDatabase($contacts)) {
            return false;
        }

        //создаём новую запись в базе
        return $this->createCommentWithPhoneAndEmail($comment, $contacts);
    }

    /**
     * Функция создаёт новые записи в моделях Comments, Email, Phone.
     * Возвращает результат работы. True - сохранено, False - нет.
     */
    private function createCommentWithPhoneAndEmail(array $comment, array $contacts): bool
    {
        $resultTransaction = false;
        try {
            DB::transaction(function () use (&$contacts, &$comment, &$resultTransaction) {
                $phone = new Phone($contacts);
                $phone->save();

                $email = new Email($contacts);
                $email->save();

                $comment += [
                    'phone_id' => $phone->id,
                    'email_id' => $email->id
                ];

                //помещаем результат выполнения создания комментария в переменную result
                $resultTransaction = Comment::create($comment)->save();
            });
        } finally {
            return $resultTransaction;
        }
    }

    /**
     * Функция сверяет номер телефона и почту с уже имеющимися в БД.
     * Если такие данные существуют, то возвращается true. Иначе false.
     * @param array $contacts
     * @return bool
     */
    private function checkPhoneAndEmailInDatabase(array $contacts): bool
    {
        $hasPhoneOrEmail = false;
        foreach ($this->comments as $comment) {
            if ($comment->phone->phone == $contacts['phone'] || $comment->email->email == $contacts['email']) {
                $hasPhoneOrEmail = true;
                break;
            }
        }
        return $hasPhoneOrEmail;
    }

    /**
     * Валидирует объекты комментария.
     * Если ошибок нет, возвращается true.
     * @param array $comment
     * @param array $contacts
     * @return bool
     */
    private function validateCommentOnInput(array $comment, array $contacts): bool
    {
        $validateData = array_merge($comment, $contacts);
        $validator = Validator::make($validateData, [
            'username' => 'required|Min:' . self::NAME_MIN_LENGTH,
            'message' => 'required|Min:' . self::MESSAGE_MIN_LENGTH,
            'phone' => 'required|regex:/^\+7([0-9]+)+$/|Min:' . self::PHONE_LENGTH . '|Max:' . self::PHONE_LENGTH,
            'email' => 'required|regex:/^.+@.+$/i|Min:' . self::EMAIL_MIN_LENGTH . '|Max:' . self::EMAIL_MAX_LENGTH,
        ]);

        return $validator->errors()->count() == 0;
    }

    //константы для валидации
    private const PHONE_LENGTH = 12;
    private const NAME_MIN_LENGTH = 4;
    private const EMAIL_MIN_LENGTH = 3;
    private const EMAIL_MAX_LENGTH = 254;
    private const MESSAGE_MIN_LENGTH = 15;
}

