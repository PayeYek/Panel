<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandAdvertise extends Model
{
    use HasFactory;

    protected $table = 'land_advertises';
    protected $fillable = [
        'land_id',
        'image',
        'alt',
        'link',
        'type',
        'view',
        'status',
        'published_at',
        'expired_at'
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

}
