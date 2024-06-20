<?php

namespace App\Models;

use App\Transformers\CategoryTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements Transformable
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'title',
        'parent_id'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children');
    }


    public function directChildren(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function transformer(): string
    {
        return CategoryTransformer::class;
    }

    public function scopeGrandChildren($query)
    {
        return $query->whereHas('parent.parent');
    }
}
