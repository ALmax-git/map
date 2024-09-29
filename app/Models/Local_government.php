<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local_government extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'postal_code', 'chairperson', 'region_id'];

    // A local government belongs to a region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // One local government has many cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
