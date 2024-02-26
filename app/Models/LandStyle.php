<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandStyle extends Model
{
    protected $table = 'land_styles';
    protected $fillable = [
        'land_id',
        'color',
        'radius',
        'product_type',
        'product_view',
        'article_type',
        'article_view',
        'video_type',
        'video_view',
        'slide_type',
        'slide_anim',
    ];

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

}
