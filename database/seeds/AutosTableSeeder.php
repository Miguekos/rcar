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
            'precio_por_dia' => $faker->randomNumber(2),
            'estado' => 0,
            'fechainicioauto' => '2018-12-01',
            'fechafinauto' => '2018-12-31',
            'garantia' => $faker->randomNumber(3),
            'disponible' => 1,
          ]);
      }
    }
}
