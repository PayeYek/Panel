<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandCategory extends Model
{
    use HasFactory;

    protected $table = 'land_categories';
    protected $fillable = [
        'title',
        'slug',
        'description'
    ];


    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug( $this->attributes['title'])
        );
    }

    public function products()
    {
        return $this->hasMany(LandProduct::class, 'land_id');
    }

}
