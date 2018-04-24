@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <h3 class="text-center">Trabajos asignados</h3>
    <hr>
    <div class="text-right mb-4">
      <a class="btn btn-primary" href="{{ route('jobs-create')}}"><i class="fas fa-suitcase"></i> {{__('Asignar trabajos')}}</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Expediente</th>
          <th>Descripcion</th>
          <th>Asignado a</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($files as $file)
          @if ( count($file->users) > 0 )
            <tr>
              <td>{{$file->code}}</td>
              <td>{{$file->description}}</td>
              <td>
                <ul>
                  @foreach ($file->users as $user)
                    <li>{{ getCompleteName($user) }}</li>
                  @endforeach
                </ul>
              </td>
              <td>{{$file->state}}</td>
            </tr>
          @endif
          <ul>
          </ul>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
