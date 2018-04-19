<?php

use Illuminate\Database\Seeder;

class ColoniasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colonias')->insert([
        	'nombre_colonia' => 'Puerta de Anahuac',
        	'municipio_id' => 30,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
