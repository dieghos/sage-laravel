@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>{{__('Crear rol.')}}</h2>
    <hr>
    <form method="POST" action="{{ route('role-store')}}">
      @csrf
      <div class="form-group">
        <label for="name">{{__('Nombre')}}</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="label">{{__('Descripcion')}}</label>
        <input type="text" class="form-control" name="label" value="{{ old('label') }}">
      </div>
      <label>Permisos</label>
      @foreach ($permissions as $key => $permission)
        <div class="form-check">
          <input class="form-check-input" name="permissions[]"
          type="checkbox" id="permissions" value="{{ $permission->name }}">
          <label class="form-check-label text-capitalize" for="permissions">
            {{ $permission->name }}
          </label>
        </div>
      @endforeach
      <p class="text-center mt-2">
        <button class="btn btn-primary" type="submit">Crear</button>
        <a class="btn btn-light" href="{{ route('role-list') }}">Volver</a>
      </p>
    </form>
  </div>
@endsection
