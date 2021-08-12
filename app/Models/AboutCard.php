<?php

namespace App\Models;

use App\Models\Adfm\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AboutCard extends Model
{
    use HasFactory;
    use SoftDeletes;
    use hasSlug;

    protected $table = 'about_cards';
    protected $fillable = ['title', 'excerpt', 'slug'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
