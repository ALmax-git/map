<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'capital', 'postal_code', 'population', 'area', 'timezone', 'iso_code', 'country_id'];

    // A state belongs to a country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // One state has many regions
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
