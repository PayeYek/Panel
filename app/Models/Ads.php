<?php

namespace App\Models;

use App\Support\CodeGeneratorHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ads extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'province_id',
        'tracking_code',
        'title',
        'description',
        'mobile',
        'price',
        'agreement',
        'exchange',
        'image',
        'pictures',
        'status',
        'published_at'
    ];

    protected $casts = [
        'pictures' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_code = CodeGeneratorHelper::generateUniqueTrackingCode('ads', 'tracking_code');
        });
    }


    /**-------------------------***
     * SET - GET
     * --------------------------*/

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? Str::slug($value) : Str::slug($this->attributes['title'])
        );
    }


    /**-------------------------***
     * Relationships
     * --------------------------*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id');
    }


    /**-------------------------***
     * File handler
     * --------------------------*/

    public function getImageAttribute()
    {
        $item = $this->attributes['image'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getImage()
    {
        return $this->attributes["image"];
    }

    public function setPicturesAttribute($value)
    {
        $this->attributes['pictures'] = empty($value) ? json_encode([]) : json_encode($value);
    }

    public function getPicturesAttribute()
    {
        $pictures = $this->attributes['pictures'];

        if (is_null($pictures)) return [];

        $pictures = json_decode($pictures, true);
        for ($i = 0; $i < count($pictures); $i++) {
            $pictures[$i] = Str::isUrl($i) ? $i : asset('storage/' . $pictures[$i]);
        }
        return $pictures;
    }

    public function getPictures()
    {
        $pictures = $this->attributes["pictures"];

        if (is_null($pictures)) return [];

        return json_decode($pictures, true);
    }
}
