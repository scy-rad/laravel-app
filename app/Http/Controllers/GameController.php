<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    // CRUD
    // C - create
    // R - read
    // U - update
    // D - delete


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

//         $faker= Factory::create('pl_PL');

//         for ($i = 0; $i < 3; $i++) {
//             $gamelist[] = [
//                 'name' => $faker->name,
//                 'street' => $faker->streetName,
//                 'houseNumber' => $faker->numberBetween(1, 100),
//                 'flatNumber' => $faker->numberBetween(1, 100)
//             ];
//         }


// dump ($request);
//         return view('game.index', [
//             'gamelist' => $gamelist

//         ]);

        //$games = DB::table('games')
        //    ->select('id', 'title', 'score', 'genre_id')
        //    ->get();

        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->get();

        $bestGames = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->where('score', '>', 9)
            //->where('score', 91) // default: =
            ->get();

        /*
            $query = DB::table('games')
                ->select('id', 'title', 'score', 'genre_id')
                ->where([
                    ['score', '>', 20],
                    ['id', 55]
                ])
            ;
        */

        /*
        $query = DB::table('games')
            ->select('id', 'title', 'score', 'genre_id')
            ->where('score', '>', 95)
            ->orWhere('id', 55)
        ;
        */

        $query = DB::table('games')
            ->select('id', 'title', 'score', 'genre_id')
            ->whereIn('id', [22, 42, 53])
            //->whereBetween('id', [33, 35])
        ;

//dd($query->get());
//dd($query->toSql());

        $stats = [
            'count' => DB::table('games')->count(),
            'countScoreGtSeven' => DB::table('games')->where('score', '>', 7)->count(),
            'max' => DB::table('games')->max('score'),
            'min'=> DB::table('games')->min('score'),
            'avg'=> DB::table('games')->avg('score'),
        ];

        $scoreStats = DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('count', '>', 50)       //działa na wynikach grupowania
            ->groupBy('score')
            ->orderBy('count','desc')
            ->get();

        return view('game.list', [
            'games' => $games,
            'bestGames' => $bestGames,
            'stats' => $stats,
            'scoreStats' => $scoreStats
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dump ('AKCJA create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump ('AKCJA store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $gameId)//: View
    {
        //$game = DB::table('games')->where('id', $gameId)->get();
        //$game = DB::table('games')->where('id', $gameId)->first();

        $game = DB::table('games')->find($gameId);

        return view('game.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dump ('AKCJA edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump ('AKCJA update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump ('AKCJA destroy');
    }
}
