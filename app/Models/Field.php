<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Field extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'category_id', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
