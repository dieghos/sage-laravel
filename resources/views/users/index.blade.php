@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <table class="table">
      <caption>
        {{ sprintf("Mostrando usuario/s %d a %d de %d resultados.",
          $users->firstItem(),$users->lastItem(),$users->total()) }}
      </caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $user)
            <tr>
              <th scope="row">{{ $loop->index +1}}</th>
              <td>{{ sprintf(" %s L.P. N° %d %s %s",
                $user->grado,$user->legajo,$user->apellido,$user->nombres)}}</td>
                <td>
                  @if(count($user->roles) > 0)
                    @foreach ($user->roles as $role)
                      {{ $role->name }}
                    @endforeach
                  @else
                    No hay roles asignados.
                  @endif
                </td>
                <td>
                  <form id="{{'delete-'.$user->id}}" action="{{ route('user-destroy',$user) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary"
                    href="{{ route('user-details', $user )}}"><i class="fas fa-info-circle"></i> {{__('Detalles')}}</a>
                    <button type="button" id="delete" data-user="{{'delete-'.$user->id}}"
                    class="btn btn-danger"><i class="far fa-trash-alt"></i> {{__('Borrar')}}</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
    @endsection

    @section('scripts')
      <script type="text/javascript">
      $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var user = '#'+$(this).attr('data-user'),
            formId = 'form'+user,
            parent = $(this).parents(formId);
        swal({
          title: '¿Está seguro?',
          text: 'Esta a punto de eliminar un usuario.',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, eliminar.',
          cancelButtonText: 'No, cancelar'
        }).then((result) => {
          if (result.value) {
            $(parent).submit();
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            swal(
              'Cancelado',
              'No se eliminó el usuario.',
              'error'
            )
          }
        });
      });
      </script>
    @endsection
