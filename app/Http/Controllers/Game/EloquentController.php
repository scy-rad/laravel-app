<?php

namespace App\Http\Controllers\Game;

//use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

use App\Model\Game;


class EloquentController extends Controller
{

    // CRUD
    // C - create
    // R - read
    // U - update
    // D - delete


    public function index(): View
        {

        // $newGame = new game();
        // $newGame->title = 'Tomb Raider';
        // $newGame->description = 'Przygoda, skarby';
        // $newGame->score = 9;
        // $newGame->publisher = 'Edios';
        // $newGame->genre_id = 4;
        // $newGame->save();

        // Game::create([
        //     'title' => 'Tomb Raider 2',
        //     'description' => 'Przygoda, skarby',
        //     'score' => 8,
        //     'publisher' => 'Edios',
        //     'genre_id' => 4
        // ]);

        // $newGame = new game([
        //     'title' => 'Tomb Raider 3',
        //     'description' => 'Przygoda, skarby',
        //     'score' => 8,
        //     'publisher' => 'Edios',
        //     'genre_id' => 4
        // ]);
        // $newGame->save();


        // $game = Game::find(123);
        // dump($game);
        // $game->description = 'Opis po aktualizacji';
        // $game->save();

        // $gameIds = [123,124,125,126];
        // foreach ($gameIds as $gameId) {
        //     $game = Game::find($gameId);
        //     $game->description = 'Opis w pętli '.$gameId;
        //     $game->save();
        // }

        // $gameIds = [123,124,125,126];
        // Game::whereIn('id', $gameIds)
        //     ->update([
        //         'description' => 'Opis w Where In '
        //     ]);





        // $game = Game::find(124);
        // $game->delete();

        // Game::destroy(125);
        // Game::destroy(126, 127, 128);        // wywoływane jest X zapytań - dla każdego ID osobne zapytanie
        // Game::destroy([129, 130, 131]);      // wywoływane jest X zapytań - dla każdego ID osobne zapytanie

        // Game::whereIn('id',[132, 133, 134])->delete();  // wywoływane jest 1 zapytanie


        $games = Game::with('genre')
          ->publisher('Edios')
          ->orderBy('created_at')
          ->paginate(10);

        // $games = Game::orderBy('created_at')
        //   ->paginate(10);


            return view('game.eloquent.list', [
                'games' => $games
            ]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(): View
    {


        $bestGames = Game::with('genre')
        //->where('score', '>', 9)
        ->best()    //to jest scope, który zastępuje powyższe
        //->genre(3)  //to jest też scope, tylko z parametrem
        ->get();

        $stats = [
            'count' => Game::count(),
            'countScoreGtSeven' => Game::where('score', '>', 7)->count(),
            'max' => Game::max('score'),
            'min'=> Game::min('score'),
            'avg'=> Game::avg('score'),
        ];

        $scoreStats = Game:: select(DB::raw('count(*) as count'), 'score')
            ->having('count', '>', 50)       //działa na wynikach grupowania
            ->groupBy('score')
            ->orderBy('count','desc')
            ->get();

        return view('game.eloquent.dashboard', [
            'bestGames' => $bestGames,
            'stats' => $stats,
            'scoreStats' => $scoreStats
        ]);


    }



    public function show(int $gameId)//: View
    {
        $game = Game::find($gameId);
        $game = Game::findOrFail($gameId);
        $game = Game::where('id',$gameId)->first();
        $game = Game::firstWhere('id',$gameId);

        return view('game.eloquent.show', [
            'game' => $game
        ]);
    }

}
