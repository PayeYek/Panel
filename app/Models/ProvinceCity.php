<?php

namespace App\Models;

use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProvinceCity extends Model implements Transformable
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'province_id'];

    public function transformer(): string
    {
        return CityTransformer::class;
    }


    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function advertises(): HasMany
    {
        return $this->hasMany(Advertise::class);
    }
}
