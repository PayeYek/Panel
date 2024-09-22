<?php

namespace App\Models;

use App\Trait\HasSeo;
use Illuminate\Database\Eloquent\Casts\Attribute as ModelAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class LandProduct extends Model
{
    use HasFactory;
    use HasSeo;

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
        'pictures',
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
        'pictures' => 'array',
    ];

    protected function slug(): ModelAttribute
    {
        return new ModelAttribute(
            set: fn($value) => $value ? \Str::slug($value) :
                \Str::slug(
                    ($this->category->slug ? ' ' . $this->category->slug : '')
                    . ($this->attributes['tonnage'] ? ' ' . $this->attributes['tonnage'] . 'ton' : '')
                    . ($this->attributes['model'] ? ' ' . $this->attributes['model'] : '')
                    . ($this->brand->title ? ' ' . $this->brand->title : '')
                )
        );
    }

    protected function description(): ModelAttribute
    {
        return new ModelAttribute(
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
                    . ($usage ? 'با کاربری ' . $usage : '')
                    . ($cabin == '0' ? '، بدون خواب' : '')
                    . ($cabin == '1' ? '، خواب دار' : '')
                    . ($model ? ' مدل ' . $model : '');
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

    public function setPicturesAttribute($value)
    {
        $this->attributes['pictures'] = empty($value) ? json_encode([]) : json_encode($value);
    }

    public function getPicturesAttribute()
    {
        $pictures = $this->attributes['pictures'];

        if (is_null($pictures)) return [];

        $pictures = json_decode($pictures, true);
        for ($i = 0; $i < count($pictures); $i++) {
            $pictures[$i] = Str::isUrl($i) ? $i : asset('storage/' . $pictures[$i]);
        }
        return $pictures;
    }

    public function getPictures()
    {
        $pictures = $this->attributes["pictures"];

        if (is_null($pictures)) return [];

        return json_decode($pictures, true);
    }

//    public function getPicturesAttribute()
//    {
//        $item = $this->attributes['pictures'];
//
//        if (empty($item)) {
//            return null;
//        }
//
//        $data = [];
//        if (is_array($item)){
//            foreach ($item as $i){
//                $data[] = Str::isUrl($i) ? $i : asset('storage/' . $i);
//            }
//        }
//        return $data;
//    }
//
//    public function getPictures()
//    {
//        return $this->attributes["pictures"];
//    }

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

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function category()
    {
        return $this->belongsTo(LandCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(LandBrand::class, 'brand_id');
    }

    public function products()
    {
        return $this->hasMany(LandProduct::class);
    }

    public function videos()
    {
        return $this->hasMany(LandVideo::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(LandCategory::class, 'land_products', 'land_id', 'category_id')->distinct();
    }

    public function attributes()
    {
        return $this->belongsToMany(LandAttribute::class, 'land_attribute_product', 'product_id', 'attribute_id')->using(LandAttributeProductValues::class)->withPivot('value_id');
    }
}
