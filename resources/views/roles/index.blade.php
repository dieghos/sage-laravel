@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="text-right mb-4">
      <a href="{{ route('role-create') }}" class="btn btn-lg btn-primary">Nuevo</a>
    </div>
    <table class="table">
      <caption>
        {{ sprintf("Mostrando %d a %d roles de %d totales.",
          $roles->firstItem(),$roles->lastItem(),$roles->total()) }}
      </caption>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Permisos</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $key => $role)
          <tr>
            <th scope="row">{{ $loop->index+1 }}</th>
            <td>{{ $role->name }}</td>
            <td class="text-capitalize">
              <ul>
                @foreach ($role->permissions()->get() as $permission)
                  <li>
                    {{ $permission->name }}
                  </li>
                @endforeach
              </ul>
            </td>
            <td>
              <form id="{{'delete-'.$role->id}}" action="{{ route('role-destroy',$role) }}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-primary"
                href="{{ route('role-details', $role )}}">Detalles</a>
                <button type="button" id="delete"
                class="btn btn-danger" data-role = "{{'delete-'.$role->id }}" >Borrar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
  $(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var role = '#'+$(this).attr('data-role'),
        formId = 'form'+role,
        parent = $(this).parents(formId);
    swal({
      title: '¿Está seguro?',
      text: 'Esta a punto de eliminar un rol.',
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
          'No se eliminó el rol.',
          'error'
        )
      }
    });
  });
  </script>
@endsection
