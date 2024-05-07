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
        'slug',
    ];

    public function category(): HasMany
    {
        return $this->hasMany(LandComment::class, 'parent_id', 'id');
    }

    public function advertise(): BelongsToMany
    {
        return $this->belongsToMany(Advertise::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }

    public function specificationValues(): BelongsToMany
    {
        return $this->belongsToMany(SpecificationValue::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }
}
