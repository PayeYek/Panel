<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandAttribute extends Model
{
    protected $table = 'land_attributes';
    protected $fillable = ['name', 'parent_id', 'priority'];

    public function parent()
    {
        return $this->belongsTo(LandAttribute::class, 'parent_id');
    }

    public function values()
    {
        return $this->hasMany(LandAttributeValue::class, 'attribute_id');
    }

    public function child()
    {
        return $this->hasMany(LandAttribute::class, 'parent_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(LandCategory::class, 'land_attribute_category', relatedPivotKey: 'category_id');
    }
}
