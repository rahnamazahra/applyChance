<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $table = 'countries';
    public $timestamps = false;
    protected $fillable = ['title', 'slug'];
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
    public function univercities()
    {
        return $this->hasMany(Univercity::class, 'country_id');
    }
}
