<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

      $limit = 1;

      for ($i = 0; $i < $limit; $i++) {
          DB::table('promos')->insert([ //,
              'nombre' => 'Estandar',
              'vigencia' => Carbon::now(),
              'dias_pagados' => 0,
              'dias_libres' => 0,

          ]);
      }
    }
}
