@extends('layouts.files')

@section('expedientes')
  @if ( count($files)>0 )
    <h2 class="text-center">Listado de expedientes</h2>
    @foreach ($files as $key => $file)
      @include('shared.files-list')
    @endforeach
    {{ $files->links() }}
  @else
    <h4 class="text-center">No hay expedientes cargados</h4>
  @endif
@endsection
