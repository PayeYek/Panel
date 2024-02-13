<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandAttributeCategory extends Model
{
    protected $table = 'land_attribute_category';
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo(LandAttribute::class, 'attribute_id');
    }

    public function category()
    {
        return $this->belongsTo(LandCategory::class, 'category_id');
    }
}
