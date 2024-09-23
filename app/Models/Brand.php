<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = 'brands';
    protected $fillable = [
        'title',
    ];

    public function productModels(): HasMany
    {
        return $this->hasMany(ProductModel::class);
    }
}
