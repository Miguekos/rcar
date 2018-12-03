<?php

use Illuminate\Database\Seeder;

class AutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create('es_ES');
      $faker->addProvider(new \Faker\Provider\Fakecar($faker));

      $limit = 10;

      $color = 'azul';

      for ($i = 0; $i < $limit; $i++) {
          DB::table('autos')->insert([ //,
            'marca' => $faker->vehicle,
            'modelo' => $faker->vehicleBrand,
            'placa' => $faker->vehicleRegistration,
            'color' => $color,
            'anio' => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
            'imagen1' => "/img/car/" . $i . ".jpg",
          ]);
      }
    }
}
