<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandAttributeValue extends Model
{
    protected $table = 'land_attribute_values';
    protected $fillable = ['value'];

    public function attribute()
    {
        return $this->belongsTo(LandAttribute::class);
    }
}
