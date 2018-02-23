<?php

use Illuminate\Database\Seeder;

class EstatusUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus_usuarios')->insert([
        	'id' => 1,
        	'estatus_usaurio' => 'Activo',
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),	
        ]);
    }
}
