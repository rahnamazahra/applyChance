<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'country_id', 'slug'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
     public function univercities()
    {
        return $this->hasMany(Univercity::class, 'city_id');
    }
}
