<table class="table">
  <tr>
    <th>Rol</th>
    <th>Permisos</th>
  </tr>
  @foreach ($user->roles()->get() as $key => $role)
    <tr>
      <td>{{$role->name}}</td>
      <td class="text-capitalize">
        @foreach ($role->permissions()->get() as $key => $permission)
          {{ $permission->name.' ' }}
        @endforeach
      </td>
    </tr>
  @endforeach
</table>
