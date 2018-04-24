@extends('layouts.app')

@section('content')
  <div class="container">
    <h3 class="font-weight-bold mb-1">Detalles</h3>
    <h4>Usuario</h4>
    <hr>
    <dt class="font-weight-bold">Grado</dt>
    <dd>{{ $user->grado }}</dd>
    <dt class="font-weight-bold">Legajo</dt>
    <dd>{{ $user->legajo }}</dd>
    <dt class="font-weight-bold">Apellido</dt>
    <dd>{{ $user->apellido }}</dd>
    <dt class="font-weight-bold">Nombres</dt>
    <dd>{{ $user->nombres }}</dd>
    <dt class="font-weight-bold">Roles</dt>
    <dd>
      @if (count($user->roles)>0)
        @include('shared.roles-table')
      @else
        No hay roles asignados.
      @endif

    </dd>
    <p class="text-center mt-2">
      <a class="btn btn-lg btn-primary" href="{{ route('user-edit', $user->id ) }}"><i class="fas fa-edit"></i> {{__('Editar')}}</a>
      <a class="btn btn-lg btn-light" href="{{ route('user-list') }}"><i class="fas fa-arrow-left"></i> {{__('Volver')}}</a>
    </p>
  </div>
@endsection
