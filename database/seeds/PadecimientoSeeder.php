<?php

use Illuminate\Database\Seeder;

class PadecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('padecimientos')->insert([
        	'nombre_padecimiento' => 'Dolor de Cabeza',
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
