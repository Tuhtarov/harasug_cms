<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeRecord extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_records';
    protected $guarded = false;
}