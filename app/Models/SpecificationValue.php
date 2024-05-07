<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecificationValue extends Model
{
    use SoftDeletes;

    protected $table = 'specification_values';
    protected $fillable = [
        'title',
        'slug'
    ];

    public function specification(): BelongsTo
    {
        return $this->belongsTo(Specification::class);
    }

    public function advertise(): BelongsToMany
    {
        return $this->belongsToMany(Advertise::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'advertise_specification_value'); //Todo maybe need keys definition
    }
}
