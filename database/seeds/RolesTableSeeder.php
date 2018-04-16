<?php

use Illuminate\Database\Seeder;
use App\Permission;

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

      $permissions = DB::table('permissions')->get();

      foreach ($permissions as $permission) {
        DB::table('permission_role')->insert([
          'permission_id' => $permission->id,
          'role_id' => App\Role::where('name','SuperAdministrador')->value('id'),
        ]);
      };
    }
}
