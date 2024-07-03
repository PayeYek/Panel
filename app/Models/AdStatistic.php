<?php

namespace App\Models;

use App\Enum\AdStatisticActionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Builder;
class AdStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'user_id',
        'action',
    ];

    protected $casts = [
        'action' => AdStatisticActionEnum::class,
    ];


    /**-------------------------***
     * Scope methods
     * --------------------------*/
    public function scopeWithAction(Builder $query, int $action): Builder
    {
        return $query->where('action', $action);
    }

    public function scopeViews(Builder $query): Builder
    {
        return $query->withAction(AdStatisticActionEnum::VIEW->value);
    }

    public function scopeCalls(Builder $query): Builder
    {
        return $query->withAction(AdStatisticActionEnum::CALL->value);
    }

    /**-------------------------***
     * Methods
     * --------------------------*/
    public static function countViews(int $adId): int
    {
        return self::where('ad_id', $adId)
            ->where('action', AdStatisticActionEnum::VIEW)
            ->count();
    }

    public static function countCalls(int $adId): int
    {
        return self::where('ad_id', $adId)
            ->where('action', AdStatisticActionEnum::CALL)
            ->count();
    }


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
