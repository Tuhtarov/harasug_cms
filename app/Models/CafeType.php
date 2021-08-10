<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_types';
    protected $guarded = false;

    public function cafe_category()
    {
        return $this->hasMany(CafeCategory::class, 'cafe_type_id', 'id');
    }
}
