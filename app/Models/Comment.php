<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function phone() {
        return $this->hasOne(Phone::class, 'phone_id', 'id');
    }

    public function email() {
        return $this->hasOne(Email::class, 'email_id', 'id');
    }
}
