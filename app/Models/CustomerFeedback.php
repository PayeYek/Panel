<?php

namespace App\Models;

use App\Enum\GenderTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class CustomerFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'image',
        'video',
        'first_name',
        'last_name',
        'city',
        'title',
        'gender',
        'description',
        'purchased_product',
        'priority'
    ];

    protected $casts = [
        'gender' => GenderTypeEnum::class,
    ];

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class);
    }

    public function getImageAttribute()
    {
        $item = $this->attributes['image'] ?? null;

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }
}
