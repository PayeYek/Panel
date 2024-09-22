<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class LandVideo extends Model
{

    protected $table = 'land_videos';
    protected $fillable = [
        'land_id',
        'product_id',
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

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(LandProduct::class, 'product_id');
    }
}
