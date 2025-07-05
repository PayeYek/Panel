<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandAttributeProduct extends Model
{
    protected $table = 'land_attribute_product';
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo(LandAttribute::class, 'attribute_id');
    }

    public function product()
    {
        return $this->belongsTo(LandProduct::class, 'product_id');
    }
}
