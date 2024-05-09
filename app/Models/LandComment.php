<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandComment extends Model
{
    protected $fillable = [
        'land_id',
        'product_id',
        'parent_id',
        'comment',
        'approved',
        'name',
        'phone',
        'email'
    ];

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(LandProduct::class);
    }


    public function children(): HasMany
    {
        return $this->hasMany(LandComment::class, 'parent_id', 'id');
    }

    /*********************/

    public function getApprovedAttribute($value)
    {
        return (bool)$value;
    }
}
