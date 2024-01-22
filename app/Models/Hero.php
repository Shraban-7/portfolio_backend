<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the subtitles associated with the hero.
     */
    public function subtitles()
    {
        return $this->belongsToMany(HeroSubTitle::class, 'hero_herosubtitles')->withTimestamps();
    }
}
