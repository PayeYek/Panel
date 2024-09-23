<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandColor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'land_colors';
    protected $fillable = ['name', 'title'];
}
