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
          'name' => 'Administrar usuarios',
          'label' => 'CRUD de usuarios.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'Administrar roles',
          'label' => 'Administracion de los roles.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'Administrar permisos',
          'label' => 'Administracion de los permisos.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'Administrar expedientes',
          'label' => 'Crear, editar y borrar expedientes.',
      ]);

      DB::table('permissions')->insert([
          'name' => 'Asignar trabajos',
          'label' => 'Asignar trabajos al personal.',
      ]);
    }
}
