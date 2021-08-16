<?php

namespace App\Models;

use App\Models\Adfm\File;
use App\Models\Adfm\Traits\AttachmentTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Chill extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use AttachmentTrait;

    protected $table = 'chills';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
        'price',
        'price_info'
    ];

    public function getUrlAttribute()
    {
        return '/chill/'.$this->slug;
    }

    public function setPublishedAtAttribute($value)
    {
        if ($value == null) {
            $this->attributes['published_at'] = Carbon::now();
        } else {
            $this->attributes['published_at'] = $value;
        }
    }

    public function image()
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('model_relation', '=', 'image');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
