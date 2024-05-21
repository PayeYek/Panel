<?php

namespace App\Models;

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
        'communication_mobile',
        'primary_image',
        'slider_images',
        'car_condition',
        'mileage',
        'production_year',
        'city_id',
        'province_id',
        'color',
        'brand',
        'model',
        'fuel_type',
        'engine_condition',
        'chassis_condition',
        'body_condition',
        'third_party_insurance_date',
        'gearbox_type',
        'price',
        'agreement',
        'state',
        'category',
        'usage',
    ];

    protected $casts = [
        'slider_images' => 'array',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id', 'id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
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

    public function setSliderImagesAttribute($value)
    {
        $this->attributes['slider_images'] = empty($value) ? json_encode([]) : json_encode($value);
    }

    public function getSliderImagesAttribute()
    {
        $pictures = $this->attributes['slider_images'];

        if (is_null($pictures)) return [];

        $pictures = json_decode($pictures, true);
        for ($i = 0; $i < count($pictures); $i++) {
            $pictures[$i] = Str::isUrl($i) ? $i : asset('storage/' . $pictures[$i]);
        }
        return $pictures;
    }

    public function getSliderImages()
    {
        $pictures = $this->attributes["slider_images"];

        if (is_null($pictures)) return [];

        return json_decode($pictures, true);
    }
}
