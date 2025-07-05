<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandSlide extends Model
{
    use HasFactory;

    protected $table = 'land_slides';
    protected $fillable = [
        'land_id',
        'image',
        'alt',
        'link',
        'infos',
        'view',
        'status',
        'published_at',
        'expired_at',
    ];

    protected $casts = [
        'infos' => 'array',
    ];

//    public function setInfosAttribute($value)
//    {
//        $this->attributes['infos'] = empty($value) ? json_encode([]) : json_encode($value);
//    }
//
//
//    public function getInfosAttribute()
//    {
//        $data = $this->attributes["infos"];
//
//        return is_null($data) ? [] : $data;
//    }

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

    // ارتباط چند به یک با زمین
    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }
}
