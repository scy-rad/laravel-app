<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Model\Scope\LastWeekScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //use HasFactory;

    // protected $table = 'nazwa_tabeli_danych';
    // protected $table = 'games'; //default
    // protected $primaryKey = 'id'; //default
    // protected $timestamps = true; //default
    protected $attributes = [
        'score' => 5
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope(new LastWeekScope);   // implementacja GlobalScope
    // }


    public function genre() {
        //in game function genre return $this->hasMany(Game::class);
        //table : genre
        //fk: games.genre_id    - generuje na podstawie nazwy funkcji
        //pk: genres.id

        return $this->belongsTo(Genre::class);
    }

    public function scopeBest(Builder $query) : Builder
    {
     return $query
            ->where('score', '>=', '9')
            ->orderBy('score','desc');
    }

    public function scopeGenre(Builder $query, int $genreID) : Builder
    {
     return $query
            ->where('genre_id', $genreID);
    }

}
