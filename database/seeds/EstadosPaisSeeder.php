<?php

use Illuminate\Database\Seeder;

class EstadosPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_pais')->insert([
        	'nombre_estado' => 'Zacatecas',
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
