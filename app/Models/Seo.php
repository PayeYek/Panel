<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;

    protected $table = 'seo';

    protected $fillable = [
        'description',
        'title',
        'image',
        'image_alt',
        'robots',
        'canonical_url',
        'keywords',
        'og_title',
        'og_description',
        'og_image',
        'og_url',
        'og_keywords',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
