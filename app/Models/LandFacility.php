<?php

namespace App\Models;

use App\Enum\LandFacilityStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandFacility extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'land_facilities';

    protected $fillable = [
        'phone',
        'full_name',
        'land_id',
        'category_id',
        'land_products',
        'product_id',
        'land_products',
        'amount',
        'comment',
        'state',
    ];

    protected $casts = [
        'state' => LandFacilityStateEnum::class,
    ];

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class, 'land_id');
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(LandCategory::class);
    }

}
