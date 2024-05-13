<?php

namespace App\Models;

use App\Enum\LandSubscribeStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandSubscribe extends Model
{
    use HasFactory;

    protected $table = 'land_subscribes';
    protected $fillable = [
        'phone',
        'land_id',
        'comment',
        'state'
    ];

    protected $casts = [
        'state' => LandSubscribeStateEnum::class
    ];
}
