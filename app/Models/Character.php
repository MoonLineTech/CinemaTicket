<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = 'characters';
    protected $guarded = [];
    public function movies()
    {
        return $this->belongsToMany(Movie::class,'video_characters');
    }


}
