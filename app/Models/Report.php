<?php

namespace App\Models;

use App\Enum\ReportStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'ad_id',
        'mobile',
        'text',
        'state',
        'opinion',
    ];

    protected $casts = [
        'state' => ReportStateEnum::class,
    ];

    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}
