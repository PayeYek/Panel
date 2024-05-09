<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function categories(): HasManyThrough
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

    public function products(): HasMany
    {
        return $this->hasMany(LandProduct::class, 'land_id');
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(LandCategory::class, 'land_products', 'land_id', 'category_id')->distinct();
    // }

    // ارتباط یک به چند با محصولات

    public function slides(): HasMany
    {
        return $this->hasMany(LandSlide::class, 'land_id');
    }

    // ارتباط یک به چند با اسلایدها

    public function articles(): HasMany
    {
        return $this->hasMany(LandArticle::class, 'land_id');
    }

    // ارتباط یک به چند با مقالات

    public function agencies(): HasMany
    {
        return $this->hasMany(LandAgency::class, 'land_id');
    }

    public function advertise(): HasMany
    {
        return $this->hasMany(LandAgency::class, 'land_id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(LandVideo::class, 'land_id');
    }

    public function styles(): HasOne
    {
        return $this->hasOne(LandStyle::class, 'land_id');
    }

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug($this->attributes['title'])
        );
    }
}
