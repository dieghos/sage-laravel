<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
Use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users' => User::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->grado = $request->grado;
        $user->apellido = $request->apellido;
        $user->nombres = $request->nombres;
        $user->legajo = $request->legajo;

        $user->roles()->detach();
        $user->save();
        if($request->has('role')){
          $newRoles = $request->input('role.*');
          foreach ($newRoles as $key => $newRole) {
            $user->assignRole($newRole);
          }
        }
        alert()->success('Exito','Se actualizó el usuario exitosamente.');
        return view('users.show',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      alert()->success('Usuario eliminado.','Se eliminó el registro exitosamente.');
      return back();
    }
}
