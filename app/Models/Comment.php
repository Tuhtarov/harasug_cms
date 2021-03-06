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

    public $timestamps = false;

    protected $fillable = ['username', 'message', 'email_id', 'phone_id'];

    public function isConfirmed() : bool
    {
        return (bool) $this->is_confirmed;
    }

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
        return $this->belongsTo(Phone::class, 'phone_id', 'id');
    }

    public function email() {
        return $this->belongsTo(Email::class, 'email_id', 'id');
    }
}
