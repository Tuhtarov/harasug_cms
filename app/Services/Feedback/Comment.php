<?php

namespace App\Services\Feedback;

use App\Contracts\Feedback\CommentsInterface;
use App\Models\Email;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Utils;

class Comment implements CommentsInterface
{
    private Collection $comments;

    public function initVariable(bool $getAll = false)
    {
        if($getAll == false)
            $this->comments = \App\Models\Comment::with(['phone', 'email'])
                ->where('is_published', '=', true)
                ->get()->collect();
        else
            $this->comments = \App\Models\Comment::withTrashed()->with(['phone', 'email'])
                ->get()->collect();
    }

    //возвращает коллекцию не включая удалённые и не опубликованные
    public function getComments(): Collection
    {
        $this->initVariable();
        return $this->comments;
    }

    //возвращает всю коллекцию, включая удалённые и не публичные
    public function getCommentsAll(): Collection
    {
        $this->initVariable(true);
        return $this->comments;
    }

    public function saveComments(array $comment): bool
    {
        //если сохраняемый комментарий не валиден, возвращаем false
        if($this->validateCommentOnInput($comment) == false) return false;

        //инициализурем коллекцию имеющихся комментраиев
        $this->initVariable();

        //если в БД уже есть номер телефона и почта, то возвращаем false
        if($this->checkPhoneAndEmailInDatabase($comment['phone'], $comment['email'])) return false;

        //сохраняем поступившие данные в базу
        return $this->createCommentWithPhoneAndEmail($comment);
    }

    /**
     * Функция создаёт новые записи в моедлях Comments, Email, Phone.
     * Возвращает результат работы. True - сохранено, False - нет.
     */
    private function createCommentWithPhoneAndEmail(array &$comment): bool
    {
        $resultTransaction = false;
        try {
            DB::transaction(function () use (&$comment, &$resultTransaction) {
                $phone = new Phone([
                    'phone' => $comment['phone']
                ]);
                $phone->save();

                $email = new Email([
                    'email' => $comment['email']
                ]);
                $email->save();

                //помещаем результат выполнения создания комментария в переменную result
                $resultTransaction = \App\Models\Comment::create([
                    'username' => $comment['name'],
                    'message' => $comment['message'],
                    'phone_id' => $phone->id,
                    'email_id' => $email->id
                ])->save();
            });
        } finally {
            return $resultTransaction;
        }
    }

    /**
     * Функция сверяет номер телефона и почту с уже имеющимися в БД.
     * Если такие данные существуют, то возвращается true. Иначе false.
     * @param string $_phone
     * @param string $_email
     * @return bool
     */
    private function checkPhoneAndEmailInDatabase(string $_phone, string $_email) : bool {
        $hasPhoneOrEmail = false;
        foreach ($this->comments as $comment) {
            if($comment->phone->phone == $_phone || $comment->email->email == $_email) {
                $hasPhoneOrEmail = true;
                break;
            }
        }

        return $hasPhoneOrEmail;
    }

    /**
     * Валидирует объекты комментария.
     * @param array $comment
     * @return bool
     */
    private function validateCommentOnInput(array &$comment) : bool {
        $validator = Validator::make($comment, [
            'name' => 'required|Min:'.self::NAME_MIN_LENGTH,
            'phone' => 'required|regex:/^\+7([0-9]+)+$/|Min:'.self::PHONE_LENGTH.'|Max:'.self::PHONE_LENGTH,
            'email' => 'required|regex:/^.+@.+$/i|Min:'.self::EMAIL_MIN_LENGTH.'|Max:'.self::EMAIL_MAX_LENGTH,
            'message' => 'required|Min:' . self::MESSAGE_MIN_LENGTH,
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

