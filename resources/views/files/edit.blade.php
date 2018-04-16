@extends('layouts.files')

@section('expedientes')
  <div class="container-fluid">
    <form class="" action="{{ route('file-update',$file) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="code">{{__('Codigo')}}</label>
        <input type="text" class="form-control" name="code" value="{{ $file->code }}">
      </div>
      <div class="form-group">
        <label for="description">{{__('Descripción')}}</label>
        <textarea type="text" class="form-control" name="description">{{$file->description }}</textarea>
      </div>
      <div class="form-group">
        <label for="comments">{{__('Comentarios')}}</label>
        <input type="text" class="form-control" name="comments" value="{{ $file->comments }}">
      </div>
      <div class="form-group">
        <label for="etx">{{__('ETX N°')}}</label>
        <input type="text" class="form-control" name="etx" value="{{ $file->etx }}">
      </div>
      <div class="form-group">
        <label for="time_limit">{{__('Plazo')}}</label>
        <input type="date" class="form-control" name="time_limit" value="{{ $file->time_limit }}">
      </div>
      <div class="form-group">
        <div class="row">
          @foreach ($file->documents as $document)
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{ Storage::url($document->path)}}" />
                <a href="{{}}">&times;</a>
              </div>
            </div>
          @endforeach
        </div>
        <label for="filename">{{__('Adjuntar documentos')}}</label>
        <input type="file" class="form-control" name="filename[]" multiple>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Actualizar') }}
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
