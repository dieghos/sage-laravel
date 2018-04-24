@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link {{setActive('files/create')}}" href="{{ route('file-create') }}">{{__('Cargar')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{setActive('files')}}" href="{{ route('file-list') }}">{{__('Lista')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{setActive('status')}}" href="{{ route('file-status') }}">{{__('Cambiar estado')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{setActive('file-term')}}" href="{{ route('file-term-list') }}">{{__('Vencimientos')}}</a>
          </li>
        </ul>
      </nav>
      <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        @yield('expedientes')
      </main>
    </div>
  </div>
@endsection
