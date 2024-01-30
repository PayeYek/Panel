<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandColor extends Model
{
    use HasFactory;

    protected $table = 'land_colors';
    public $timestamps = false;
    protected $fillable = ['name', 'title'];
}
