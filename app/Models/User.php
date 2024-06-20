<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\GenderTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

//    public function findForPassport($username): User
//    {
//        return $this->where('mobile', $username)->first();
//    }

    /**-------------------------***
     * New Attribute
     * --------------------------*/
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
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

    public function advertises(): HasMany
    {
        return $this->hasMany(Advertise::class, 'user_id', 'id');
    }
}
