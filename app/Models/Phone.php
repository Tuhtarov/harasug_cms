<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'phones';
    protected $fillable = ['phone'];

    public $timestamps = false;

    public function comment() {
        return $this->hasOne(Comment::class, 'phone_id', 'id');
    }
}
