<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Diego Alberto',
        	'ap_paterno' => 'Calvillo',
        	'ap_materno' => 'Rodríguez',
        	'username' => 'dcalvillo',
        	'tipo_usuario_id' => 1,
        	'email' => 'diegocalvillordz@gmail.com',
        	'password' => bcrypt('123456'),
        	'estatus_usuario_id' => 1
        ]);
    }
}
