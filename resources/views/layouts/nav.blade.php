<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          {{-- <img src="{{ asset('melody/images/faces/face5.jpg') }}" alt="image"/> --}}
        </div>
        <div class="profile-name">
          <p class="name">
            {{ Auth::user()->name }}
          </p>
          <p class="designation">
            @foreach (Auth::user()->roles as $rol)
              {{ $rol->name }}
            @endforeach
          </p>
        </div>
      </div>
    </li>
    @if (Auth::user()->hasAnyRole(['SuperAdmin', 'Administrador']))
      <li class="nav-item">
      <a class="nav-link" href="{{ route('ptoventa') }}">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @else
    @endif
    @can('boxes.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#caja" aria-expanded="false" aria-controls="caja">
          <i class="fas fa-cash-register menu-icon"></i>
          <span class="menu-title">Caja</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="caja">
          <ul class="nav flex-column sub-menu">
            @can('boxes.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('boxes.index') }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('boxes.index') }}">Listado</a></li>
            @endcan
            @can('boxes.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('boxes.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('concepts.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#conceptos" aria-expanded="false" aria-controls="conceptos">
          <i class="fas fa-tasks menu-icon"></i>
          <span class="menu-title">Conceptos de ing/eg</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="conceptos">
          <ul class="nav flex-column sub-menu">
            @can('concepts.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('concepts.index') }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('concepts.index') }}">Listado</a></li>
            @endcan
            @can('concepts.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('concepts.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('moves.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#movimientos" aria-expanded="false" aria-controls="movimientos">
          <i class="fas fa-search-dollar menu-icon"></i>
          <span class="menu-title">Movimientos de caja</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="movimientos">
          <ul class="nav flex-column sub-menu">
            @can('moves.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('moves.index') }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('moves.index') }}">Listado</a></li>
            @endcan
            @can('moves.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('moves.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('categories.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="fas fa-tags menu-icon"></i>
          <span class="menu-title">Categorías</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            @can('categories.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('categories.index') }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('categories.index') }}">Listado</a></li>
            @endcan
            @can('categories.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('categories.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan

    @can('clients.index')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clientes" aria-expanded="false" aria-controls="page-layouts">
              {{-- <i class="fab fa-trello menu-icon"></i> --}}
              <i class="fas fa-people-arrows menu-icon"></i>
              <span class="menu-title">Clientes</span>
              <i class="menu-arrow"></i>
            </a>
          <div class="collapse" id="clientes">
            <ul class="nav flex-column sub-menu">
              @can('clients.index')
                  {{-- <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ route('clients.index') }}">
                      Listado
                    </a>
                  </li> --}}
                  <li class="nav-item d-lg-block">
                    <a class="nav-link" href="{{ route('clients.index') }}">
                      Listado
                    </a>
                  </li>
              @endcan
              @can('clients.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('clients.create') }}">Crear</a></li>
              @endcan
            </ul>
          </div>
        </li>
    @endcan
    @can('providers.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#proveedores" aria-expanded="false" aria-controls="page-layouts">
          <i class="fas fa-dolly-flatbed menu-icon"></i>
          <span class="menu-title">Proveedores</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="proveedores">
          <ul class="nav flex-column sub-menu">
            @can('providers.index')
              {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('providers.index') }}">Listado</a></li> --}}
              <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('providers.index') }}">Listado</a></li>
            @endcan
            @can('products.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('providers.create') }}">Crear</a></li>
              @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('products.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#productos" aria-expanded="false" aria-controls="page-layouts">
          <i class="fas fa-boxes menu-icon"></i>
          <span class="menu-title">Productos</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="productos">
          <ul class="nav flex-column sub-menu">
            @can('products.index')
              {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('products.index') }}">Listado</a></li> --}}
              <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('products.index') }}">Listado</a></li>
            @endcan
            @can('products.create')
                <li class="nav-item"> <a class="nav-link" href="{{ route('products.create') }}">Crear</a></li>
              @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('purchases.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#compras" aria-expanded="false" aria-controls="page-layouts">
          <i class="fas fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="compras">
          <ul class="nav flex-column sub-menu">
            @if (Auth::user()->hasAnyRole('SuperAdmin', 'Administrador'))
              @can('purchases.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('purchases.index') }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('purchases.index') }}">Listado</a></li>
              @endcan
            @endif
            @if (Auth::user()->hasRole('Comprador'))
              @can('purchases.index')
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('purchases.user_id', Auth::id() ) }}">Listado</a></li> --}}
                <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('purchases.user_id', Auth::id() ) }}">Listado</a></li>
              @endcan
            @endif
            @can('purchases.create')
              <li class="nav-item"> <a class="nav-link" href="{{ route('purchases.create') }}">Crear</a></li>
            @endcan
        </div>
      </li>
    @endcan
    @can('sales.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ventas" aria-expanded="false" aria-controls="ventas">
          <i class="fas fa-hand-holding-usd menu-icon"></i>
          <span class="menu-title">Ventas</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ventas">
          <ul class="nav flex-column sub-menu">
            @can('sales.index')
              {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('sales.index') }}">Listado</a></li> --}}
              <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('sales.index') }}">Listado</a></li>
            @endcan
            @can('sales.create')
              <li class="nav-item"> <a class="nav-link" href="{{ route('sales.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('business.index')
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#configuracion" aria-expanded="false" aria-controls="configuracion">
        <i class="fas fa-cogs menu-icon"></i>
        <span class="menu-title">Configuración</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="configuracion">
        <ul class="nav flex-column sub-menu">
          {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('business.index') }}">Empresa</a></li> --}}
          <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('business.index') }}">Empresa</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('printer.index') }}">Impresora</a>
          </li>
        </ul>
      </div>
    </li>
    @endcan
    @can('users.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false" aria-controls="usuarios">
          <i class="fas fa-users-cog menu-icon"></i>
          <span class="menu-title">Usuarios</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="usuarios">
          <ul class="nav flex-column sub-menu">
            @can('users.index')
              {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('users.index') }}">Listado</a></li> --}}
              <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('users.index') }}">Listado</a></li>
            @endcan
            @can('users.create')
              <li class="nav-item"> <a class="nav-link" href="{{ route('users.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('roles.index')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="roles">
          <i class="fas fa-user-tag menu-icon"></i>
          <span class="menu-title">Roles</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="roles">
          <ul class="nav flex-column sub-menu">
            @can('roles.index')
              {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('roles.index') }}">Listado</a></li> --}}
              <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('roles.index') }}">Listado</a></li>
            @endcan
            @can('users.create')
              <li class="nav-item"> <a class="nav-link" href="{{ route('roles.create') }}">Crear</a></li>
            @endcan
          </ul>
        </div>
      </li>
    @endcan
    @can('sales.reports.day')
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#reportes" aria-expanded="false" aria-controls="reportes">
        <i class="fas fa-clipboard-list menu-icon"></i>
        <span class="menu-title">Reportes</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="reportes">
        <ul class="nav flex-column sub-menu">
          {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('sales.reports.day') }}">Ventas por día</a></li> --}}
          <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('sales.reports.day') }}">Ventas por día</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('sales.reports.date') }}">Ventas por fecha</a>
          </li>
          {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('purchases.reports.purchases.day') }}">Compras por día</a></li> --}}
          <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('purchases.reports.purchases.day') }}">Compras por día</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('purchases.reports.purchases.date') }}">Compras por fecha</a>
          </li>
          {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('boxes.reports.corte_diario') }}">Corte de caja por día</a></li> --}}
          <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ route('boxes.reports.corte_diario') }}">Corte de caja por día</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('boxes.reports.corte_por_fecha') }}">Corte de caja por fecha</a>
          </li>
        </ul>
      </div>
    </li>
    @endcan
  </ul>
</nav>