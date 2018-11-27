<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('clientes')->insert([ //,
                'apellidoPaterno' => $faker->lastname,
                'apellidoMaterno' => $faker->lastname,
                'nombres' => $faker->name,
                'dni' => $faker->randomNumber(8),
                'image' => $faker->imageUrl($width = 100, $height = 100, 'people', true, 'Faker', true),
                'fechaNacimiento' => $faker->date,
                'correo' => $faker->email,
                'celular' => $faker->randomNumber(9),
                'direccion' => $faker->address,
                'ciudad' => $faker->city,
                'cci' => $faker->randomNumber(9),
                'banco' => $faker->name,
                'nombreTitularCuenta' => $faker->name,
                'numeroBrevete' => $faker->randomNumber(9),
                'fechaVencimientoBrevete' => $faker->date,
                'fotoDni' => $faker->name,
                'calificacionCliente' => $faker->randomNumber(1),
                'comentariosAdicionales' => $faker->text,
            ]);
        }
    }
}
