@extends('layouts.files')

@section('expedientes')
  <div class="container">
    <h3 class="text-center mb-4"> Requerimientos con plazo.</h3>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h5>Vencen hoy:</h5>
        @foreach ($today as $file)
          <div class="list-group">
            <a href="{{ route('file-details',$file) }}" class="list-group-item list-group-item-danger flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $file->code }}</h5>
                <small>Ingresó hace {{dateDifference($file->created_at,date("Y-m-d H:i:s") )}} días.</small>
              </div>
              <p class="mb-1">{{ $file->description }}</p>
              <small>{{ $file->state }}</small>
            </a>
          </div>
        @endforeach
      </div>
      <div class="col-md-6">
        <h5>Vencen esta semana:</h5>
        @foreach ($week as $file)
          <div class="list-group">
            <a href="{{ route('file-details',$file) }}" class="list-group-item list-group-item-warning flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $file->code }}</h5>
                <small>Ingresó hace {{dateDifference($file->created_at,date("Y-m-d H:i:s") )}} días.</small>
              </div>
              <p class="mb-1">{{ $file->description }}</p>
              <small>{{ $file->state }}</small>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
