@extends('layouts.files')

@section('expedientes')
  <div class="container-fluid">
    <form class="" action="{{ route('file-store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="code">{{__('Codigo')}}</label>
        <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}">
        @if ($errors->has('code'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="description">{{__('Descripción')}}</label>
        <textarea type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="comments">{{__('Comentarios')}}</label>
        <input type="text" class="form-control {{ $errors->has('comments') ? ' is-invalid' : '' }}" name="comments" value="{{ old('comments') }}">
        @if ($errors->has('comments'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('comments') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="etx">{{__('ETX N°')}}</label>
        <input type="text" class="form-control {{ $errors->has('etx') ? ' is-invalid' : '' }}" name="etx" value="{{ old('etx') }}">
        @if ($errors->has('etx'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('etx') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="time_limit">{{__('Plazo')}}</label>
        <input type="date" class="form-control {{ $errors->has('time_limit') ? ' is-invalid' : '' }}" name="time_limit" value="{{ old('time_limit') }}">
        @if ($errors->has('time_limit'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('time_limit') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="filename">{{__('Adjuntar documentos')}}</label>
        <input type="file" class="form-control" name="filename[]" multiple>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            <i class="far fa-file-alt"></i> {{ __('Crear nuevo expediente') }}
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
