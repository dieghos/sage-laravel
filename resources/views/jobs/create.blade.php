@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    @if (count($users)==0)
        <h3 class="text-center">No hay expedientes cargados</h3>
    @else
      <form action="{{ route('jobs-list')}}" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Buscar código o descripción..." name="q">
          <div class="input-group-append">
            @if (request()->input('q'))
              <button class="btn btn-outline-secondary" id="cleaner" type="button">Limpiar filtro</button>
            @endif
            <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
          </div>
        </div>
      </form>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Asignado a</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($files as $key => $file)
            <tr>
              <td>{{ $file->code }}</td>
              <td>{{ $file->description }}</td>
              <td>
                <select name="{{$file->id}}" onchange="getVal(this)">
                  <option selected value="not">Seleccionar usuario...</option>
                  @foreach ($users as $key => $user)
                    <option value="{{$user->id}}">{{ sprintf("%s L.P. N° %s %s, %s",
                      $user->grado,$user->legajo,$user->apellido,$user->nombres)}}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="hidden" id="url-{{ $file->id }}" value="{{ url(config('app.url').route('file-details', $file->id, false )) }}">
                  <button id="button" class="btn btn-primary" type="button" data-id="{{$file->id}}" name="btn-{{$file->id}}" disabled>Asignar</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    @endif
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    function getVal(select){
      var name = 'btn-'+select.name;
      if(select.value !=='not'){
        $("button[name="+name+"]").removeAttr('disabled');
      }
    };
    $(document).on('click','#cleaner',function(e){
      e.preventDefault();
      window.location.href = '/jobs';
    });

    $(document).on('click','#button',function(e){
      var id =$(this).attr('data-id');
      var value = $("select[name="+id+"]").val();
      var urlid = "#url-"+id;
      var url = $(urlid).val();
      var token = $("meta[name=csrf-token]").attr('content');
      $.ajax({
        url:'/jobs',
        method:'POST',
        data:{ _token: token, user: value, url:url, file: id  },
        beforeSend: function(){
          swal.showLoading();
        },
        complete: function(){
          swal.hideLoading();
        },
        success: function(result){
          swal({
            title:'Se ha creado un trabajo.',
            text:'Se envió un mail a la casilla de correo del usuario',
            type:'success',
          });
        },
        error: function(xhr,status,error){
          var str = xhr.responseJSON.message;
          var err = '';
          if (str.indexOf("SQLSTATE[23000]: ") >= 0){
            err = 'Este expediente ya ha sido asignado a ese usuario';
          }else{
            err = str;
          }
          swal({
            title:'Se produjo un error.',
            text: err,
            type:'error',
          });
        }
      });
    });
  </script>
@endsection
