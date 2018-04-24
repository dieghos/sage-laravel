@extends('layouts.files')

@section('expedientes')
  @if (count($files)>0)
    <form class="" action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar..." name="q">
        <div class="input-group-append">
          @if (request()->input('q'))
            <button class="btn btn-outline-secondary" id="cleaner" type="button">Limpiar filtro</button>
          @endif
          <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-filter"></i> {{__('Filtrar')}}</button>
        </div>
      </div>
    </form>
    <hr>
    <table class="table borderless">
      <thead>
        <tr>
          <th>Expediente N°</th>
          <th>Descripción</th>
          <th>Estado</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($files as $file)
          <tr>
            <input type="hidden" value="{{ $file->id }}">
            <td>{{ $file->code }}</td>
            <td>{{ $file->description }}</td>
            <td>
              <select class="custom-select" name="{{$file->id}}"
                onchange="getVal(this);">
                @foreach ($states as $key => $state)
                  <option value="{{$state}}" {{$file->state == $state ? 'selected':''}}>{{$state}}</option>
                @endforeach
              </select>
            </td>
            <td>
              <button type="button" class="btn btn-primary" id="button" data-id ="{{$file->id}}"
                name="btn-{{$file->id}}" disabled><i class="far fa-edit"></i> {{__('Actualizar')}}</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <h5 class="text-center">No se encontraron resultados.</h5>
    @endif
    {{ $files->links() }}
  @endsection

  @section('scripts')
    <script type="text/javascript">
    function getVal(select){
      var name = 'btn-'+select.name;
      $("button[name="+name+"]").removeAttr('disabled');
    };

    $(document).on('click',"#button",function(e){
      e.preventDefault();
      var id =$(this).attr('data-id');
      var value = $("select[name="+id+"]").val();
      var token = $("meta[name=csrf-token]").attr('content');
      $.ajax({
        url:'/files/'+id,
        method:'POST',
        data:{ _method:'PATCH', _token:token, state: value },
        success: function(response){
          swal({
            type: 'success',
            title: 'Registro actualizado',
            text: 'Se asignó un nuevo estado.',
          }).then((result)=>{
            window.location.href = '/status';
          });
        },
        error: function(xhr,status,error){
          swal({
            type: 'error',
            title: 'Se produjo un error.',
            text: xhr.responseJSON.message,
          })
        }
      });
    });

    $(document).on('click','#cleaner',function(e){
      e.preventDefault();
      window.location.href = '/status';
    });
    </script>
  @endsection
