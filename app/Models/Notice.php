<?php

namespace App\Models;

use App\Enum\NotifyTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'province_id',
        'min_price',
        'max_price',
        'status',
        'expired_at'
    ];


    protected $casts = [
        'type' => NotifyTypeEnum::class,
    ];


    /**-------------------------***
     * Methods
     * --------------------------*/



    /**-------------------------***
     * Scopes
     * --------------------------*/
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }


    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
