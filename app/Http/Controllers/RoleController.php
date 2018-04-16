<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
          'name' => $request->name,
          'label' => $request->label,
        ]);
        if($request->has('permissions')){
          $permissions = $request->input('permissions.*');
          foreach ($permissions as $key => $permission) {
            $role->givePermissionTo(Permission::where('name',$permission)->firstOrFail());
          }
        }
        alert()->success('Nuevo rol.', 'Rol creado exitosamente.');
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->label = $request->label;

        $role->permissions()->detach();
        $role->save();
        if($request->has('permission')){
          $newPermission = $request->input('permission.*');
          foreach ($newPermission as $key => $newPermission) {
            $role->givePermissionTo(Permission::where('name',$newPermission)->firstOrFail());
          }
        }
        alert()->success('Exito','Se actualizó el rol exitosamente.');

        return view('roles.show',compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      dd($role);
    }
}
