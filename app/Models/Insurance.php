<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use SoftDeletes;

    protected $table = 'insurances';
    protected $fillable = [
        'title',
        'slug'
    ];
}
