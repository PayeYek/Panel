<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as ModelAttr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandCategory extends Model
{
    use HasFactory;

    protected $table = 'land_categories';
    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    protected function slug(): ModelAttr
    {
        return new ModelAttr(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug( $this->attributes['title'])
        );
    }

    public function products()
    {
        return $this->hasMany(LandProduct::class, 'land_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(LandAttribute::class,'land_attribute_category','category_id', 'attribute_id');
    }
}
