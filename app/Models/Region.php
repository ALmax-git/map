<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'population', 'area', 'timezone', 'state_id'];

    // A region belongs to a state
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // One region has many local governments
    public function localGovernments()
    {
        return $this->hasMany(Local_government::class);
    }
}