<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandFile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'size', 'path', 'thumbnail'];


    public function getPathAttribute()
    {
        $item = $this->attributes['path'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getPath()
    {
        return $this->attributes["path"];
    }


    public function getThumbnailAttribute()
    {
        $item = $this->attributes['thumbnail'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getThumbnail()
    {
        return $this->attributes["thumbnail"];
    }
}
