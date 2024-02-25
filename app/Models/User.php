<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'family',
        'email',
        'phone',
        'username',
        'password',
        'gender',
        'birthday',
        'national_code',
        'email_verified_at',
        'phone_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    /** My Attribute */
    protected function fullname(): Attribute
    {
        return new Attribute(
            get: fn() => "{$this->name} {$this->family}"
        );
    }

    /** Custom Attribute */
    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => bcrypt($value)
        );
    }

    /** Relationships */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
