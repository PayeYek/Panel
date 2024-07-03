<?php

namespace App\Models;

use App\Enum\AdvertiseStateEnum;
use App\Support\CodeGeneratorHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ad extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'province_id',
        'tracking_code',
        'title',
        'description',
        'mobile',
        'price',
        'agreement',
        'exchange',
        'image',
        'pictures',
        'state',
        'published_at'
    ];

    protected $casts = [
        'pictures' => 'array',
        'state'    => AdvertiseStateEnum::class,
    ];

    protected $dates = ['published_at'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_code = CodeGeneratorHelper::generateUniqueTrackingCode('ads', 'tracking_code');
        });
    }


    /**-------------------------***
     * SET - GET
     * --------------------------*/

    protected function slug(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value ? Str::slug($value) : Str::slug($this->attributes['title'])
        );
    }

    public function scopeApproved($query)
    {
        return $query->where('state', AdvertiseStateEnum::APPROVED);
    }

    /**-------------------------***
     * Relationships
     * --------------------------*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id');
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function adStatistics(): HasMany
    {
        return $this->hasMany(AdStatistic::class);
    }

    /**-------------------------***
     * File handler
     * --------------------------*/
    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return null;
                }

                return filter_var($value, FILTER_VALIDATE_URL) ? $value : asset('storage/' . $value);
            },
            // Optional: Define set function if needed
            set: fn($value) => $value,
        );
    }


    public function getImage()
    {
        return $this->attributes["image"];
    }

    protected function pictures(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (is_null($value)) return [];

                $pictures = json_decode($value, true);
                for ($i = 0; $i < count($pictures); $i++) {
                    if (filter_var($pictures[$i], FILTER_VALIDATE_URL)) {
                        // If it's a valid URL, keep it as is
                        continue;
                    }
                    // Otherwise, create a full URL to the stored file
                    $pictures[$i] = asset('storage/' . $pictures[$i]);
                }
                return $pictures;
            },
            set: function ($value) {
                return is_null($value) ? json_encode([]) : json_encode($value);
            }
        );
    }

    public function getPictures()
    {
        $pictures = $this->attributes["pictures"];

        if (is_null($pictures)) return [];

        return json_decode($pictures, true);
    }
}
