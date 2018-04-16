@extends('layouts.files')

@section('expedientes')
  <div class="container-fluid">
    <form class="" action="{{ route('file-store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="code">{{__('Codigo')}}</label>
        <input type="text" class="form-control" name="code" value="{{ old('code') }}">
      </div>
      <div class="form-group">
        <label for="description">{{__('Descripción')}}</label>
        <textarea type="text" class="form-control" name="description" value="{{ old('description') }}"></textarea>
      </div>
      <div class="form-group">
        <label for="comments">{{__('Comentarios')}}</label>
        <input type="text" class="form-control" name="comments" value="{{ old('comments') }}">
      </div>
      <div class="form-group">
        <label for="etx">{{__('ETX N°')}}</label>
        <input type="text" class="form-control" name="etx" value="{{ old('etx') }}">
      </div>
      <div class="form-group">
        <label for="time_limit">{{__('Plazo')}}</label>
        <input type="date" class="form-control" name="time_limit" value="{{ old('time_limit') }}">
      </div>
      <div class="form-group">
        <label for="filename">{{__('Adjuntar documentos')}}</label>
        <input type="file" class="form-control" name="filename[]" multiple>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Crear nuevo expediente') }}
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
