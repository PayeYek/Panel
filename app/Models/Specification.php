<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;

    protected $table = 'specifications';
    protected $fillable = [
        'title',
        'type'
    ];

    public function values(): HasMany
    {
        return $this->hasMany(SpecificationValue::class);
    }

    public function advertises(): BelongsToMany
    {
        return $this->belongsToMany(Advertise::class, 'advertise_specification_values')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function usages(): BelongsToMany
    {
        return $this->belongsToMany(Usage::class, 'usage_specifications');
    }
}
