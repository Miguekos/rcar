<?php

use Illuminate\Database\Seeder;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create('es_ES');

      $limit = 12;

      for ($i = 0; $i < $limit; $i++) {
          DB::table('promos')->insert([ //,
              'nombre' => $faker->name,
              'vigencia' => $faker->date,
              'dias_pagados' => $faker->randomNumber(8),
              'dias_libres' => $faker->randomNumber(8),

          ]);
      }
    }
}
