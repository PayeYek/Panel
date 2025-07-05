<?php

namespace App\Models;

use App\Transformers\ProvinceTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model implements Transformable
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];


    public function transformer(): string
    {
        return ProvinceTransformer::class;
    }

    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function cities(): HasMany
    {
        return $this->hasMany(ProvinceCity::class);
    }

    public function notices(): HasMany
    {
        return $this->hasMany(Notice::class);
    }

}
