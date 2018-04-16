<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Administrador<span class="caret"></span>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      @can('Administrar usuarios')
        <a class="dropdown-item" href="{{ route('user-list') }}">
          {{ __('Administrar usuarios') }}
        </a>
      @endcan
      @can('Administrar roles')
        <a class="dropdown-item" href="{{ route('role-list') }}">
          {{ __('Administrar roles') }}
        </a>
      @endcan
    </div>
</li>
