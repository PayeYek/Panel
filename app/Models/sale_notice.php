<?php

namespace App\Models;

use App\Models\Blog\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class sale_notice extends Model
{
    use HasFactory;
    protected $table = 'sale_notices';

    protected $casts = [
        'publish' => 'boolean',
        'pinned'  => 'boolean'
    ];

    protected $fillable = [
        'company_id',
        'slug',
        'title',
        'description',
        'circularNo',
        'body',
        'file',
        'pinned',
        'publish',
        'voice',
        'published_at',
        'expired_at',
        'updated_at'
    ];

    public function scopePublished($query)
    {
        return $query->where('publish', true)
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', Carbon::now());
            });
    }

    public function scopePinned($query)
    {
        return $query->where('pinned', true);
    }

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? \Str::slug($value) : \Str::slug($this->attributes['title'])
        );
    }

    public function getFileAttribute()
    {
        $item = $this->attributes['file'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }
    public function getVoiceAttribute()
    {
        $item = $this->attributes['voice'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getFile()
    {
        return $this->attributes["file"];
    }

    public function getVoice()
    {
        return $this->attributes["voice"];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
