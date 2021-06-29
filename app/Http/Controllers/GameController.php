<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $faker= Factory::create('pl_PL');

        for ($i = 0; $i < 3; $i++) {
            $gamelist[] = [
                'name' => $faker->name,
                'street' => $faker->streetName,
                'houseNumber' => $faker->numberBetween(1, 100),
                'flatNumber' => $faker->numberBetween(1, 100)
            ];
        }


dump ($request);
        return view('game.index', [
            'gamelist' => $gamelist

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
    public function show($id)
    {
        dump ('AKCJA show');
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
