<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'casualties', 'description', 'damage_level_id', 'city_id', 'date', 'time', 'disaster_type_id', 'city_id'];

    public function scopeDamageLevel() {
        return $this->belongsTo(DamageLevel::class);
    }
}
