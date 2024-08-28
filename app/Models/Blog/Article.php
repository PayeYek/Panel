<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $casts = [
        'publish' => 'boolean',
        'pinned'  => 'boolean'
    ];

    protected $fillable = [
        'company_id',
        'type',
        'slug',
        'title',
        'description',
        'body',
        'image',
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

    public function getImageAttribute()
    {
        $item = $this->attributes['image'];

        if (empty($item)) {
            return null;
        }

        return Str::isUrl($item) ? $item : asset('storage/' . $item);
    }

    public function getImage()
    {
        return $this->attributes["image"];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
