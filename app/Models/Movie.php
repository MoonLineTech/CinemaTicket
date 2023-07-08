<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';

    const PLAYING = 'Playing';
    const EXPIRED = 'Expired';

    const STATES = [self::PLAYING, self::EXPIRED];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function characters()
    {
        return $this->belongsToMany(character::class,'video_characters');
    }

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class,'cinemas');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'comments');
    }

}
