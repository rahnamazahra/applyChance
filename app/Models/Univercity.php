<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Univercity extends Model
{
    use HasFactory;
    protected $table      = 'univercities';
    protected $fillable   = ['country_id', 'city_id', 'title', 'slug'];
    public    $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
