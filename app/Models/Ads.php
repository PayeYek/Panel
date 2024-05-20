<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'communication_mobile',
        'primary_image',
        'slider_image',
        'used',
        'mileage',
        'year',
        'city',
        'province',
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
    ];
}
