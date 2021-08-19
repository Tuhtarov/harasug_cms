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
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'price', 'weight', 'cafe_category_id', 'deleted_at'];

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function cafe_category()
    {
        return $this->belongsTo(CafeCategory::class, 'cafe_category_id', 'id');
    }
}
