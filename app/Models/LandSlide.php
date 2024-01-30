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
        'view',
        'status',
        'published_at',
        'expired_at',
    ];
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
