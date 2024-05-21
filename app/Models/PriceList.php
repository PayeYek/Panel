<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'price',
        'production_year',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(LandCategory::class, 'category_id', 'id');
    }

}
