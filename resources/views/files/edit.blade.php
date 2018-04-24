@extends('layouts.files')

@section('expedientes')
  <div class="container-fluid">
    <form class="" action="{{ route('file-update',$file) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="code">{{__('Codigo')}}</label>
        <input type="text" class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $file->code }}">
        @if ($errors->has('code'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="description">{{__('Descripción')}}</label>
        <textarea type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{$file->description }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="comments">{{__('Comentarios')}}</label>
        <input type="text" class="form-control {{ $errors->has('comments') ? ' is-invalid' : '' }}" name="comments" value="{{ $file->comments }}">
        @if ($errors->has('comments'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('comments') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="etx">{{__('ETX N°')}}</label>
        <input type="text" class="form-control {{ $errors->has('etx') ? ' is-invalid' : '' }}" name="etx" value="{{ $file->etx }}">
        @if ($errors->has('etx'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('etx') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="time_limit">{{__('Plazo')}}</label>
        <input type="date" class="form-control {{ $errors->has('time_limit') ? ' is-invalid' : '' }}" name="time_limit" value="{{ $file->time_limit }}">
        @if ($errors->has('time_limit'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('time_limit') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <div class="row">
          @foreach ($file->documents as $document)
            <div class="col-md-3">
              <div class="thumbnail">
                  <img src="{{ Storage::url($document->path)}}" />
                  <a id="delete" data-token="{{ csrf_token() }}"
                  data-role = "{{$document->id }}">&times;</a>
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

@section('scripts')
  <script type="text/javascript">
  $(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var role = $(this).attr('data-role');
    var token = $(this).attr('data-token');
    swal({
      title: '¿Está a punto de borrar la imagen?',
      text: 'Esta a punto de eliminar una imagen.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar.',
      cancelButtonText: 'No, cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
            url: '/documents/'+role,
            type: 'POST',
            data: {_method: 'delete', _token :token},
            success: function(response) {
              window.location.href = '/files';
            },
            error: function(xhr,status,error){
              console.log(xhr);
            }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swal(
          'Cancelado',
          'No se eliminó la imágen.',
          'error'
        )
      }
    });
  });
  </script>
@endsection
