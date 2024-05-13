<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usage extends Model
{
    use SoftDeletes;

    protected $table = 'usages';
    protected $fillable = [
        'title'
    ];

    public function advertises(): HasMany
    {
        return $this->hasMany(Advertise::class);
    }
}
