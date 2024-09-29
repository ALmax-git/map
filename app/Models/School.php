<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'latitude', 'longitude', 'school_rector', 'type', 'established_date', 'contact_number', 'email', 'city_id'];

    // A school belongs to a city
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // One school has many users (students, teachers, etc.)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
