<?php

namespace App\Models;

use App\Enum\ContactUsStateEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUs extends Model
{
    protected $fillable = [
        'land_id',
        'message',
        'name',
        'phone',
        'note',
        'state',
        'email'
    ];

    protected $casts = [
        'state' => ContactUsStateEnum::class
    ];

    public function land(): belongsTo
    {
        return $this->belongsTo(Land::class);
    }
}
