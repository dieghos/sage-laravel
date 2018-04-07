<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('permissions')->insert([
          'name' => 'administrar-usuarios',
          'label' => 'CRUD de usuarios.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'administrar-roles',
          'label' => 'Administracion de los roles.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'administrar-permisos',
          'label' => 'Administracion de los permisos.',
      ]);
    }
}
