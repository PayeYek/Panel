<?php

namespace App\Models;

use App\Enum\AnnouncementPageEnum;
use App\Enum\AnnouncementTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'page',
        'type',
        'media',
        'poster',
        'target',
        'land_id'
    ];

    protected $casts = [
        'page' => AnnouncementPageEnum::class,
        'type' => AnnouncementTypeEnum::class
    ];

    public function getMedia()
    {
        return $this->attributes['media'];
    }

    public function getMediaAttribute()
    {
        $media = $this->attributes['media'];

        if (empty($media)) {
            return null;
        }

        return Str::isUrl($media) ? $media : asset('storage/' . $media);
    }

    public function getPoster()
    {
        return $this->attributes['poster'];
    }

    public function getPosterAttribute()
    {
        $poster = $this->attributes['poster'];

        if (empty($poster)) {
            return null;
        }

        return Str::isUrl($poster) ? $poster : asset('storage/' . $poster);
    }

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class);
    }

}
