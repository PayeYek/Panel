<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerticalAnnounce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desktop',
        'tablet',
        'mobile',
        'link',
        'state'
    ];

    /**-------------------------***
     * File handler
     * --------------------------*/
    protected function desktop(): Attribute
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


    public function getDesktop()
    {
        return $this->attributes["desktop"];
    }


    protected function tablet(): Attribute
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


    public function getTablet()
    {
        return $this->attributes["tablet"];
    }


    protected function mobile(): Attribute
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


    public function getMobile()
    {
        return $this->attributes["mobile"];
    }
}
