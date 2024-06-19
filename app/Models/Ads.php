<?php

namespace App\Models;

use App\Support\CodeGeneratorHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ads extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'primary_image',
        'more_images',
        'city_id',
        'category_id',
        'province_id',
        'price',
        'agreement',
        'exchange',
        'state',
    ];

    protected $casts = [
        'more_images' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_code = CodeGeneratorHelper::generateUniqueTrackingCode('ads', 'tracking_code');
        });
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getPrimaryImageAttribute()
    {
        $item = $this->attributes['primary_image'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getPrimaryImage()
    {
        return $this->attributes["primary_image"];
    }

    public function setMoreImagesAttribute($value)
    {
        $this->attributes['more_images'] = empty($value) ? json_encode([]) : json_encode($value);
    }

    public function getMoreImagesAttribute()
    {
        $pictures = $this->attributes['more_images'];

        if (is_null($pictures)) return [];

        $pictures = json_decode($pictures, true);

        if (!is_array($pictures)) return [];

        foreach ($pictures as $key => $picture) {
            $pictures[$key] = Str::isUrl($picture) ? $picture : asset('storage/' . $picture);
        }

        return $pictures;
    }

    public function getMoreImages()
    {
        $pictures = $this->attributes["more_images"];

        if (is_null($pictures)) return [];

        return json_decode($pictures, true);
    }
}
