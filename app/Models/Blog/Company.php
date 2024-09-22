<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['id', 'title', 'slug', 'logo', 'description', 'body'];

    public function getLogoAttribute()
    {
        $logo = $this->attributes['logo'];

        if (empty($logo)) {
            return null;
        }

        return Str::isUrl($logo) ? $logo : asset('storage/'.$logo);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    protected function slug(): Attribute
    {

        return new Attribute(
            set: fn($value) => $value ? Str::slug($value) : Str::slug($this->attributes['title']),
        );
    }

    // Removed these methods
    public function getLogo()
    {
        return $this->attributes["logo"];
    }

}
