<?php

namespace App\Models;

use App\Enum\AdvertisementStateEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertise extends Model
{
    use SoftDeletes;

    protected $table = 'advertises';
    protected $fillable = [
        'title',
        'description',
        'primary_image',
        'slider_images',
        'price',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'state' => AdvertisementStateEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id', 'id');
    }

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }

    public function specificationValues(): BelongsToMany
    {
        return $this->belongsToMany(SpecificationValue::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }
}
