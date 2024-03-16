<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandAgency extends Model
{
    use HasFactory;

    protected $table = 'land_agencies';
    protected $fillable = [
        'land_id',
        'province_id',
        'city_id',
        'code',
        'name',
        'manager',
        'address',
        'location',
        'telephones',
        'types',
        'description',
    ];

    protected $casts = [
        'types'   => 'array',
        'telephones' => 'array',
    ];

/*    public function setTypesAttribute($value)
    {
        $this->attributes['types'] = empty($value) ? json_encode([]) : json_encode($value);
    }


    public function getTypesAttribute()
    {
        $data = $this->attributes["types"];

        return is_null($data) ? [] : $data;
    }

    public function setTelephonesAttribute($value)
    {
        $this->attributes['telephones'] = empty($value) ? json_encode([]) : json_encode($value);
    }


    public function getTelephonesAttribute()
    {
        $data = $this->attributes["telephones"];

        return is_null($data) ? [] : $data;
    }*/

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id');
    }
}
