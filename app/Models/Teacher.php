<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['field_id', 'name', 'email'];
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
