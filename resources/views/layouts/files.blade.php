@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link {{setActive('files/create')}}" href="{{ route('file-create') }}">Cargar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{setActive('files')}}" href="{{ route('file-list') }}">Lista</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Cambiar estado</a>
          </li>
        </ul>
      </nav>
      <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        @yield('expedientes')
      </main>
    </div>
  </div>
@endsection
