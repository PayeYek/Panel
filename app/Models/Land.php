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

    public function getLogoOriginAttribute()
    {
        $logo = $this->attributes['logo_origin'] ?? null;

        if (empty($logo)) {
            return null;
        }

        return Str::isUrl($logo) ? $logo : asset('storage/' . $logo);
    }

    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(
            LandCategory::class,
            LandProduct::class,
            'land_id', // Foreign key on LandProduct table
            'id', // Local key on LandCategory table
            'id', // Local key on Land table
            'category_id' // Foreign key on LandProduct table
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(LandProduct::class, 'land_id');
    }

    public function slides(): HasMany
    {
        return $this->hasMany(LandSlide::class, 'land_id');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(LandArticle::class, 'land_id');
    }

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

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function contactUs(): HasMany
    {
        return $this->hasMany(ContactUs::class);
    }

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug($this->attributes['title'])
        );
    }

    public function customerFeedbacks(): HasMany
    {
        return $this->hasMany(CustomerFeedback::class);
    }

    // Removed these methods
    public function getLogo()
    {
        return $this->attributes["logo"];
    }

    public function getLogoOrigin()
    {
        return $this->attributes["logo_origin"];
    }
}
