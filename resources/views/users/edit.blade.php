@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>{{__('Editar usuario')}}</h2>
    <hr>
    <form method="POST" action="{{ route('user-update',$user)}}">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="grado">{{__('Grado')}}</label>
        <input type="text" class="form-control" name="grado" value="{{ $user->grado }}">
      </div>
      <div class="form-group">
        <label for="legajo">Legajo</label>
        <input type="number" class="form-control" name="legajo" value="{{ $user->legajo }}">
      </div>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="{{ $user->apellido }}">
      </div>
      <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" name="nombres" value="{{ $user->nombres }}">
      </div>
      <label>Roles</label>
      @foreach ($roles as $key => $role)
        <div class="form-check">
          <input class="form-check-input" name="role[]"
          type="checkbox" id="roles" value="{{ $role->name }}"
            @if ($user->hasRole($role->name))
                checked
            @endif
          >
          <label class="form-check-label" for="roles">
            {{ $role->name }}
          </label>
        </div>
      @endforeach
      <p class="text-center mt-2">
        <button class="btn btn-primary" type="submit"><i class="far fa-save"></i> {{__('Guardar')}}</button>
        <a class="btn btn-light" href="{{ route('user-details', $user) }}"><i class="fas fa-arrow-left"></i> {{__('Volver')}}</a>
      </p>
    </form>
  </div>
@endsection
