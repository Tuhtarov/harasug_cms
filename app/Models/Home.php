<?php

namespace App\Models;

use App\Models\Adfm\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Home extends Model
{
    use HasFactory;
    use hasSlug;
    use SoftDeletes;

    protected $table = 'homes';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function images() {
        return $this->morphMany(File::class, 'fileable');
    }
}
