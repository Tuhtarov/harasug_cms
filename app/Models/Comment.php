<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['username', 'message', 'email_id', 'phone_id'];

    /**
     * Возвращает отформатированную дату создания комментария.
     * @return string|null
     */
    public function getFormattedDate(): ?string
    {
        setlocale(LC_TIME, 'Russian');
        return  iconv("windows-1251","utf-8", Carbon::parse($this->created_at)->formatLocalized('%d %B %Y'));
    }

    public function phone() {
        return $this->hasOne(Phone::class, 'id', 'phone_id');
    }

    public function email() {
        return $this->hasOne(Email::class, 'id', 'email_id');
    }
}
