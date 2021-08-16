<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Gallery extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'galleries';
    protected $guarded = false;

    public function getUrlAttribute()
    {
        return '/gallery/'.$this->slug;
    }

    public function setPublishedAtAttribute($value)
    {
        if ($value == null) {
            $this->attributes['published_at'] = Carbon::now();
        } else {
            $this->attributes['published_at'] = $value;
        }
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
