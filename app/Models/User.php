<?php

namespace App\Models;

use App\Enum\GenderTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'mobile',
        'birthdate',
        'ssn',
        'email_verified_at',
        'ssn_verified_at',
        'certified',
        'state',
        'password'
    ];

    protected $casts = [
        'gender'            => GenderTypeEnum::class,
        'email_verified_at' => 'datetime',
        'ssn_verified_at'   => 'datetime',
        'password'          => 'hashed',
    ];

    protected $hidden = ['password', 'remember_token'];


    /**-------------------------***
     * New Attribute
     * --------------------------*/
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
    }

    public function displayName(): string
    {
        $firstName = $this->first_name;
        $lastName = $this->last_name;
        $gender = $this->gender;
        $mobile = $this->mobile;

        $title = match ($gender) {
            GenderTypeEnum::MALE => __('Mr.'),
            GenderTypeEnum::FEMALE => __('Ms.'),
            default => '',
        };

        $nameParts = array_filter([$title, $firstName, $lastName]);

        return !empty($nameParts) ? implode(' ', $nameParts) : $mobile;
    }

    public function isAuthenticated(): bool
    {
        return !empty($this->ssn) && !empty($this->birthdate) && $this->certified;
    }

    public function isAuthRequested(): bool
    {
        return !empty($this->ssn) && !empty($this->birthdate) && !$this->certified;
    }

    /**-------------------------***
     * Custom Attribute
     * --------------------------*/

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => bcrypt($value)
        );
    }

    /**-------------------------***
     * Relationships
     * --------------------------*/
    public function activeCode(): HasMany
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }

    public function bookmarks(): HasManyThrough
    {
        return $this->hasManyThrough(
            Ad::class,
            Bookmark::class,
            'user_id', // Foreign key on Bookmark table
            'id',      // Foreign key on Ad table
            'id',      // Local key on User table
            'ad_id'    // Local key on Bookmark table
        );
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function notices(): HasMany
    {
        return $this->hasMany(Notice::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function adStatistics(): HasMany
    {
        return $this->hasMany(AdStatistic::class);
    }
}
