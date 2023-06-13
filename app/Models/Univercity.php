<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Univercity extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'country_id', 'city_id', 'slug'];
    public $timestamps = false;

}
