<?php

use Illuminate\Database\Seeder;

class ConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuraciones')->insert([
        	'nombre_configuracion' => 'Prueba',
        	'valor' => 3,
        	'parametros' => "",
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
