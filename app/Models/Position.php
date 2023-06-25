<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'univercity_id', 'grade_id', 'field_id', 'deadline', 'published', 'description'];
    public function univercity()
    {
        return $this->belongsTo(Univercity::class, 'univercity_id');
    }
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

}
