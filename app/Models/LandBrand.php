<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandBrand extends Model
{
    use HasFactory;

    protected $table = 'land_brands';
    protected $fillable = [
        'title',
        'slug',
        'country',
        'image',
        'description',
    ];

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug( $this->attributes['title'])
        );
    }

    public function getImageAttribute()
    {
        $item = $this->attributes['image'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }
    public function getImage()
    {
        return $this->attributes["image"];
    }

    public function ad()
    {
        return $this->hasOne(Ads::class, 'brand_id');
    }

}
