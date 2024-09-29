<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'currency', 'phone_code', 'continent', 'official_language'];

    // One country has many states
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
