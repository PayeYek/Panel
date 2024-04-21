<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LandStyle extends Model
{
    protected $table = 'land_styles';
    protected $fillable = [
        'land_id',
        'color',
        'radius',
        'border_type',
        'product_card_type',
        'product_list_type',
        'product_striped',
        'article_card_type',
        'article_striped',
        'video_card_type',
        'category_card_type',
        'category_striped',
        'category_filter_type',
        'section_header_type',
        'contact_type',
        'quick_access_panel_type',
        'a_card_type',
        'a_view_type',
        'a_table_type',
        'a_striped',
        'slider_type',
        'slider_anim',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function landColor(): HasOne
    {
        return $this->hasOne(LandColor::class, 'id');
    }

}
