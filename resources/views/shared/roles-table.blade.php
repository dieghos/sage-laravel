<table class="table">
  <tr>
    <th>Rol</th>
    <th>Permisos</th>
  </tr>
  @foreach ($user->roles()->get() as $key => $role)
    <tr>
      <td>{{$role->name}}</td>
      <td class="text-capitalize">
        <ul>
          @foreach ($role->permissions()->get() as $key => $permission)
            <li>{{ $permission->name.' ' }}</li>
          @endforeach
        </ul>
      </td>
    </tr>
  @endforeach
</table>
