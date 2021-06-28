<?php

declare(strict_types = 1);
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Faker\Factory;

class ProfilController extends Controller
{

    public function __invoke(int $id)
    {
        dump('metoda invoke ' . $id);


        $faker= Factory::create();

        $address = [
            'postalCode' => $faker->postcode,
            'street' => $faker->streetName,
            'houseNumber' => $faker->numberBetween(1, 100),
            'flatNumber' => $faker->numberBetween(1, 100)
        ];

        //dd($address);

        return view('user.address', [
            'address' => $address

        ]);
    }
    public function show()
    {
        dd('pierwszy kontroler ' . $id);
    }
}
