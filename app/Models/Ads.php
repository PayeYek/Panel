<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use SoftDeletes;
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

    public function getSliderImages()
    {
        $images = $this->attributes["slider_images"];

        if (is_null($images)) return [];

        return json_decode($images, true);
    }
}
