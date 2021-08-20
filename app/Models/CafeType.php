<?php

namespace App\Models;

use App\Models\Adfm\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CafeType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $table = 'cafe_types';
    protected $fillable = ['name', 'message'];
    public $timestamps = false;

    public function cafe_category()
    {
        return $this->hasMany(CafeCategory::class, 'cafe_type_id', 'id');
    }

    public function image() {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
