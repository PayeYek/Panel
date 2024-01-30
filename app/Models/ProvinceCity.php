<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceCity extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
