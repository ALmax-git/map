<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'population', 'area', 'mayor', 'local_government_id'];

    // A city belongs to a local government
    public function localGovernment()
    {
        return $this->belongsTo(Local_government::class);
    }

    // One city has many schools
    public function schools()
    {
        return $this->hasMany(School::class);
    }
}