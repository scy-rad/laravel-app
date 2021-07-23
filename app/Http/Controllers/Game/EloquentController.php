<?php

namespace App\Http\Controllers\Game;

//use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class EloquentController extends Controller
{

    // CRUD
    // C - create
    // R - read
    // U - update
    // D - delete


    public function index(): View
        {

        //$games = DB::table('games')
        //    ->select('id', 'title', 'score', 'genre_id')
        //    ->get();

        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            // ->orderBy('score', 'desc')
            // ->orderByDesc('score')
            // ->limit(5)
            // ->offset(4) //rozpocznij wyświetlanie od podanego elementu
            //->get();
            ->paginate(10);
            //->simplepaginate(10);


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

        return view('game.eloquent.dashboard', [
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

        return view('game.eloquent.show', [
            'game' => $game
        ]);
    }

}
