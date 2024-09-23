<?php

namespace App\Models;

use App\Enum\AdvertiseStateEnum;
use App\Support\CodeGeneratorHelper;
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
        'agreement_price',
        'price',
        'by_installment',
        'prepayment',
        'installment',
        'installment_count',
        'exchange',
        'has_chat',
        'latitude',
        'longitude',
        'state',
        'sponsored',
        'express',
        'rise',
        'certified',
        'user_id',
        'usage_id',
        'city_id',
        'category_id',
        'tracking_code',
    ];

    protected $casts = [
        'state' => AdvertiseStateEnum::class,
        'slider_images' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_code = CodeGeneratorHelper::generateUniqueTrackingCode('advertises', 'tracking_code');
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function usage(): BelongsTo
    {
        return $this->belongsTo(Usage::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id', 'id');
    }

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'advertise_specification_values')
            ->withPivot('value')
            ->withTimestamps();
    }
}
