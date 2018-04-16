<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert([
          'grado' => 'Administrador',
          'legajo' => '0',
          'apellido' => 'SAGE',
          'nombres' => 'User',
          'email' => 'admin@sage.com',
          'password' => bcrypt('superadmin'),
      ]);

      DB::table('role_user')->insert([
        'role_id' => App\Role::where('name','SuperAdministrador')->value('id'),
        'user_id' => App\User::where('email','admin@sage.com')->value('id'),
      ]);
    }
}
