<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_categories';
    protected $guarded = false;

    public function cafe_type()
    {
        return $this->belongsTo(CafeType::class, 'cafe_type_id', 'id');
    }

    public function cafe_record()
    {
        return $this->hasMany(CafeRecord::class, 'cafe_category_id', 'id');
    }
}
