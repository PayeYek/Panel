<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandComment extends Model
{
    use HasFactory;

    protected $fillable = ['land_id', 'product_id', 'parent_id', 'comment', 'approved', 'name', 'phone', 'email'];


    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function product()
    {
        return $this->belongsTo(LandProduct::class);
    }


    public function children()
    {
        return $this->hasMany(LandComment::class, 'parent_id', 'id');
    }

    /*********************/

    public function getApprovedAttribute($value)
    {
        return (bool)$value;
    }
}
