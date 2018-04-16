@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>{{__('Editar rol')}}</h2>
    <hr>
    <form method="POST" action="{{ route('role-update',$role)}}">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name">{{__('Nombre')}}</label>
        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
      </div>
      <div class="form-group">
        <label for="label">Descripción</label>
        <input type="text" class="form-control" name="label" value="{{ $role->label }}">
      </div>
      <label>Permisos</label>
      @foreach ($permissions as $key => $permission)
        <div class="form-check">
          <input class="form-check-input" name="permission[]"
          type="checkbox" id="roles" value="{{ $permission->name }}"
            @if ($role->hasPermissions($permission->name))
                checked
            @endif
          >
          <label class="form-check-label" for="permission">
            {{ $permission->name }}
          </label>
        </div>
      @endforeach
      <p class="text-center mt-2">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a class="btn btn-light" href="{{ route('role-details', $role) }}">Volver</a>
      </p>
    </form>
  </div>
@endsection
