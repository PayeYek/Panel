<?php

namespace App\Models;

use App\Transformers\SpecificationValueTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecificationValue extends Model implements Transformable
{
    use SoftDeletes;

    protected $table = 'specification_values';
    protected $fillable = [
        'title'
    ];

    public function specification(): BelongsTo
    {
        return $this->belongsTo(Specification::class);
    }

//    public function advertise(): BelongsToMany
//    {
//        return $this->belongsToMany(Advertise::class, 'advertise_specification_values'); //Todo maybe need keys definition
//    }
//
//    public function specifications(): BelongsToMany
//    {
//        return $this->belongsToMany(Specification::class, 'advertise_specification_values'); //Todo maybe need keys definition
//    }
    public function transformer(): string
    {
        return SpecificationValueTransformer::class;
    }
}
