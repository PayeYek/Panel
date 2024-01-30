<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandAgency extends Model
{
    use HasFactory;

    protected $table = 'land_agencies';
    protected $fillable = [
        'land_id',
        'province',
        'city',
        'code',
        'name',
        'address',
        'info',
        'type',
    ];

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }
}
