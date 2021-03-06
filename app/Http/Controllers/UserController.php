<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request)
    {

        // $session = $request->session();
        // $session->put('prevAction', __METHOD__ . ':'. time());      //zapisuje klucz do sesji
        // //session(['prevAction' => __METHOD__ . ':'. time()]);      //zapisuje klucz do sesji za pośrednictwem helpera

        // //dump($request->session()->get('flashTestParam'));

        // $session->flash('flashTestParam', 'byłem tu dziś');         //zapisuje klucz do sesji - ale usunie ją automatycznie po odczytaniu :)

        // //dump($session);
        // //dump($session->get('prevAction'));

        // $faker = Factory::create('PL_pl');
        // $idX = $faker->numberBetween(0,1);
        // $session->flash('Losowanko', $idX);

        // return view('user.list');

        $users = [];

        $faker = Factory::create();
        $count = $faker->numberBetween(3, 15);
        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                'id' => $faker->numberBetween(1, 1000),
                'name' => $faker->firstName
            ];
        }

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function show(Request $request, Int $userID)
    {
        $prevSession = $request->session()->get('prevAction');
        //$prevSession = session('prevAction'); zapis alternatywny za pomocą helpera
        dump($prevSession);
        // $request->session()->put('test_tt', true);
        //     dump($request->session()->has('test_tt'));
        //     dump($request->session()->exists('test_tt'));
        // $request->session()->forget('test_tt');
        //     dump($request->session()->has('test_tt'));
        //     dump($request->session()->exists('test_tt'));

        //     dump($request->session()->all());

        // $request->session()->flush();   //czyszczxenie wszystkich danych sesji

        // dump($request->session()->get('flashTestParam'));
        // $users =[];
        // $faker = Factory::create('PL_pl');
        // $count = 10;//$faker->numberBetween(3,15);
        // for ($i = 0; $i < $count; $i++) {
        //     $users[] = [
        //         'id' => $faker->numberBetween(1,1000),
        //         'imie' => $faker->firstName,
        //         'nazwisko' => $faker->lastName,
        //         'promotor' => $faker->name
        //     ];
        // }
        // return view('user.show', ['userID' => $userID, 'users' => $users]);

        $faker = Factory::create();
        $user = [
            'id' => $userId,
            'name' => $faker->name,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(12, 25),
            'html' => '<script>alert("XSS")</script>'
        ];

        return view('user.show', [
            'user' => $user,
            'nick' => true
        ]);

    }


    public function show_helper(Request $request, int $userId)
    {
        $faker = Factory::create();
        $user = [
            'id' => $userId,
            'name' => $faker->name,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(12, 25),
            'html' => '<script>alert("XSS")</script>'
        ];

        return view('user.show', [
            'user' => $user,
            'nick' => true
        ]);
    }



    public function testShow(Request $request, int $id)
    {

        return view('user.profile', ['id' => $id, 'example' => "przykład"]);

        //return "bla bla $id";
        // return response(
        //     "<h3> to jest obiekt response: User: $id</h3>", //zwrot
        //     200,                                            //status http
        //     ['Content-type' => 'text/plain']                        //tablica hidders
        // );

        // return response(
        //     "<h3> to jest obiekt Chain response: User: $id</h3>") //zwrot
        //     ->setStatusCode(200)                                            //status http
        //     ->header('Content-type','text/html')                        //tablica hidders
        //     ->header('Own-Header','laravel');

        // return response(
        //     "<h3> to jest obiekt Chain response: User: $id</h3>", 200) //zwrot ze statusem http
        //     ->header('Content-type','text/html')                        //tablica hidders
        //     ->cookie('Sebek_header_cookie', 'marchewkowe', 10)
        //     ->header('Own-Header','laravel');


        //return redirect('users');
        //return redirect()->route('get.users');
        //return redirect()->route('get.user.address', ['id' => $id]);

        //return redirect()->action('UserController@list');
        //return redirect()->action('User\ShowAddress', ['id' => $id]);

        //return redirect()->away('http://onet.pl');


        //return view('user.profile', ['id' => $id]);

        //return response()->json(['id' => $id]);

        /*
        $uri = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();

        $httpMethod = $request->method();

        // /users/test/33?name=Tom&nick=boss
        $all = $request->all();
        //dd($all);

        $name = $request->input('name');
        $lastName = $request->input('lastName', 'Kowalski');

        //http://127.0.0.1:8000/users/test/33?name=Tom&nick=boss&games[]=quake&games[][name]=turok
        $game = $request->input('games');
        $game = $request->input('games.1');
        $game = $request->input('games.1.name');

        $allQuery = $request->query();
        $name = $request->query('name');
        $name = $request->query('name', 'Nowak');

        $expired = $request->boolean('expired');

        $hasName = $request->has('name');
        $hasParams = $request->has(['name', 'nick']);
        $hasAnyParams = $request->hasAny(['name', 'nick1']);

        $cookies = $request->cookie('my_cookie');

        $input = $request->input();
        $query = $request->query();

        dd($input, $query);

        dump($request);
        dd($id);
        */
    }

    public function testStore(Request $request, int $id)
    {
        if (!$request->isMethod('post'))
        {
            return 'Nie jest post';
        }

        $all = $request->all();

        $allQuery = $request->query();

        dump($allQuery);
        dd($all);
    }
}
