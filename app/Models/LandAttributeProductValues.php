<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LandAttributeProductValues extends Pivot
{

    public function attribute()
    {
        return $this->belongsTo(LandAttribute::class, 'attribute_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(LandProduct::class, 'product_id', 'id');
    }

    public function value()
    {
        return $this->belongsTo(LandAttributeValue::class, 'value_id', 'id');
    }
}
