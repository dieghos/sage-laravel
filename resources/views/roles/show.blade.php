@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="font-weight-bold mb-1">Detalles</h3>
    <h4>Rol</h4>
    <hr>
    <dt class="font-weight-bold">Nombre</dt>
    <dd>{{ $role->name }}</dd>
    <dt class="font-weight-bold">Descripción</dt>
    <dd>{{ $role->label }}</dd>
    <dt class="font-weight-bold">Roles</dt>
    <dd>
      @if (count($role->permissions)>0)
        <ul>
          @foreach ($role->permissions as $key => $permission)
            <li>{{ $permission->name }}</li>
          @endforeach
        </ul>
      @else
        No tiene permisos.
      @endif

    </dd>
    <p class="text-center mt-2">
      <a class="btn btn-lg btn-primary" href="{{ route('role-edit', $role->id ) }}">Editar</a>
      <a class="btn btn-lg btn-light" href="{{ route('role-list') }}">Volver</a>
    </p>
  </div>
@endsection
