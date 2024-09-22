<?php

namespace App\Models;

use App\Trait\Slugable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['title', 'slug'];

    public $timestamps = false;

    public function taggables()
    {
        return $this->morphToMany(Taggable::class, 'taggable');
    }
}
