<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
//    use HasFactory;

    public function games() {
        //return $this->hasMany('App\Model\Game');
        //table : games
        //fk: games.genre_id    - generuje na podstawie clasy do której się odwołujemy
        //pk: genres.id
        //return $this->hasMany(Game::class,'genre_id','id');

        return $this->hasMany(Game::class);
    }
}
