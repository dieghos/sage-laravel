@extends('layouts.files')

@section('expedientes')
  <div class="container">
    <h3 class="font-weight-bold mb-1">Detalles</h3>
    <h4>Expediente</h4>
    <hr>
    <dt class="font-weight-bold">Codigo</dt>
    <dd>{{ $file->code }}</dd>
    <dt class="font-weight-bold">Descripción</dt>
    <dd>{{ $file->description }}</dd>
    @if ($file->comments)
      <dt class="font-weight-bold">Comentarios</dt>
      <dd>{{ $file->comments }}</dd>
    @endif
    @if($file->etx)
      <dt class="font-weight-bold">ETX N°</dt>
      <dd>{{ $file->etx }}</dd>
    @endif
    <dt class="font-weight-bold">Estado</dt>
    <dd>{{ $file->state }}</dd>
    @if ($file->time_limit)
      <dt class="font-weight-bold">Plazo</dt>
      <dd>{{ dateFormat($file->time_limit)}}</dd>
    @endif
    @if (count($file->documents)>0)
      <dt class="font-weight-bold">Imagen</dt>
      <div class="popup-gallery">
        <a href="{{ Storage::url($file->documents()->first()->path) }}" alt="">Ver Imagenes</a>
      </div>
    @endif
    <p class="text-center mt-2">
      <a class="btn btn-lg btn-primary" href="{{ route('file-edit',$file)}}">Editar</a>
      <a class="btn btn-lg btn-light" href="{{ route('file-list')}}">Volver</a>
    </p>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Cargando imagen #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
    });
  });
  </script>
@endsection
