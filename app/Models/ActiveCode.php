<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActiveCode extends Model
{
    protected $fillable = [
        'mobile',
        'code',
        'expired_at'
    ];

    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
