<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandProduct extends Model
{
    use HasFactory;

    protected $table = 'land_products';
    protected $fillable = [
        'land_id',
        'category_id',
        'brand_id',
        'slug',
        'name',
        'model',
        'year',
        'tonnage',
        'axle',
        'usage',
        'cabin',
        'image',
        'description',
        'catalog',
        'manual',
        'country',
        'colors',
        'body',
        'view'
    ];

    protected $casts = [
        'colors' => 'array',
    ];

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) :
                \Str::slug(
                    $this->attributes['name']
                    . ($this->attributes['model'] ? ' ' . $this->attributes['model'] : '')
                    . ($this->attributes['year'] ? ' ' . $this->attributes['year'] : '')
                )
        );
    }

    protected function description(): Attribute
    {
        return new Attribute(
            set: function ($value) {

                $category = LandCategory::find($this->attributes['category_id'])->title;
                $brand = LandBrand::find($this->attributes['brand_id'])->title;
                $axle = $this->attributes['axle'];
                $model = $this->attributes['model'];
                $year = $this->attributes['year'];
                $tonnage = $this->attributes['tonnage'];
                $usage = $this->attributes['usage'];
                $cabin = $this->attributes['cabin'];


                return $value ?:
                    $category
                    . ($axle == '2' ? ' جفت محور' : '')
                    . ($axle == '3' ? ' سه محور' : '')
                    . ($tonnage ? ' ' . $tonnage . ' تن' : '')
                    . ' ' . $brand . '، '
                    . ($usage ? 'با کاربری ' . $usage  : '')
                    . ($cabin == '0' ? '، بدون خواب'  : '')
                    . ($cabin == '1' ? '، خواب دار'  : '')
                    . ($model ? ' مدل ' . $model  : '');
            }
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

    public function getCatalogAttribute()
    {
        $item = $this->attributes['catalog'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getCatalog()
    {
        return $this->attributes["catalog"];
    }

    public function getManualAttribute()
    {
        $item = $this->attributes['manual'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getManual()
    {
        return $this->attributes["manual"];
    }

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function category()
    {
        return $this->belongsTo(LandCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(LandBrand::class);
    }

    public function products()
    {
        return $this->hasMany(LandProduct::class);
    }

    public function categories()
    {
        return $this->belongsToMany(LandCategory::class, 'land_products', 'land_id', 'category_id')->distinct();
    }
}
