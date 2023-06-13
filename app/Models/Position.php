<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'univercity_id', 'grade_id', 'field_id'];

}
