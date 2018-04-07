<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('roles')->insert([
          'name' => 'SuperAdministrador',
          'label' => 'Administrador de la web app.',
      ]);
    }
}