<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usage extends Model
{
    use SoftDeletes;

    protected $table = 'usages';
    protected $fillable = [
        'title',
        'slug'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
