<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_list_id',
        'old_price',
        'new_price',
        'change_type',
    ];

    public static function calculateChangeRatios()
    {
        $totalChanges = self::count();
        if ($totalChanges == 0) {
            return [
                'increase_ratio'  => 0,
                'decrease_ratio'  => 0,
                'no_change_ratio' => 0,
            ];
        }

        $increaseCount = self::where('change_type', 'increase')->count();
        $decreaseCount = self::where('change_type', 'decrease')->count();
        $noChangeCount = self::where('change_type', 'no_change')->count();

        return [
            'increase_ratio'  => $increaseCount / $totalChanges,
            'decrease_ratio'  => $decreaseCount / $totalChanges,
            'no_change_ratio' => $noChangeCount / $totalChanges,
        ];
    }
}
