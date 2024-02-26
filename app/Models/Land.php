<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Land extends Model
{
    use HasFactory;

    protected $table = 'lands';
    protected $fillable = [
        'title',
        'slug',
        'logo',
        'logo_origin',
        'description',
        'body'
    ];

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug( $this->attributes['title'])
        );
    }

    public function getLogoAttribute()
    {
        $logo = $this->attributes['logo'];

        if (empty($logo)) {
            return null;
        }

        return Str::isUrl($logo) ? $logo : asset('storage/' . $logo);
    }
    public function getLogo()
    {
        return $this->attributes["logo"];
    }

    public function getLogoOriginAttribute()
    {
        $logo = $this->attributes['logo_origin'];

        if (empty($logo)) {
            return null;
        }

        return Str::isUrl($logo) ? $logo : asset('storage/' . $logo);
    }
    public function getLogoOrigin()
    {
        return $this->attributes["logo_origin"];
    }

    public function categories()
    {
        return $this->hasManyThrough(
            LandCategory::class,
            LandProduct::class,
            'land_id', // کلید خارجی در جدول LandProduct
            'id', // کلید اصلی در جدول LandCategory
            'id', // کلید اصلی در جدول Land
            'category_id' // کلید خارجی در جدول LandProduct
        );
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(LandCategory::class, 'land_products', 'land_id', 'category_id')->distinct();
    // }

    // ارتباط یک به چند با محصولات
    public function products()
    {
        return $this->hasMany(LandProduct::class, 'land_id');
    }

    // ارتباط یک به چند با اسلایدها
    public function slides()
    {
        return $this->hasMany(LandSlide::class, 'land_id');
    }

    // ارتباط یک به چند با مقالات
    public function articles()
    {
        return $this->hasMany(LandArticle::class, 'land_id');
    }

    public function agencies()
    {
        return $this->hasMany(LandAgency::class, 'land_id');
    }
    public function adverties()
    {
        return $this->hasMany(LandAgency::class, 'land_id');
    }

    public function videos()
    {
        return $this->hasMany(LandVideo::class, 'land_id');
    }

    public function styles()
    {
        return $this->hasOne(LandStyle::class, 'land_id');
    }
}
