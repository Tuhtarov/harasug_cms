<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public function comment() {
        return $this->belongsTo(Comment::class, 'email_id', 'id');
    }
}
