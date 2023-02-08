<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }}" href="#">
                <i class="bi bi-grid"></i> <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-heading">Páginas</li>
        @can('Categoria_Ver')
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('categories') ? '' : 'collapsed' }} " href="{{ route('categorias') }}">
                    <i class="bi bi-bar-chart-steps"></i> <span>Categorias</span>
                </a>
            </li>
        @endcan
        @can('Producto_Ver')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('products') ? '' : 'collapsed' }}" href="{{ route('productos') }}">
                    <i class="bi bi-bag-dash"></i> <span>Productos</span>
                </a>
            </li>
        @endcan
        @can('Ventas_Ver')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pos') ? '' : 'collapsed' }}" href="{{ route('ventas') }}">
                    <i class="bi bi-cart3"></i> <span>Ventas</span>
                </a>
            </li>
        @endcan
        @can('Roles_Ver')
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('roles') ? '' : 'collapsed' }} " href="{{ route('roles') }}">
                    <i class="bi bi-key"></i> <span>Roles</span>
                </a>
            </li>
        @endcan
        @can('Permisos_Ver')
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('permissions') ? '' : 'collapsed' }} " href="{{ route('permisos') }}">
                    <i class="bi bi-ui-checks"></i> <span>Permisos</span>
                </a>
            </li>
        @endcan
        @can('Asignar_Ver')
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('asignar') ? '' : 'collapsed' }} " href="{{ route('asignar') }}">
                    <i class="bi bi-eye"></i> <span>Asignar</span>
                </a>
            </li>
        @endcan
        @can('Usuarios_Ver')
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('users') ? '' : 'collapsed' }} " href="{{ route('usuarios') }}">
                    <i class="bi bi-people"></i> <span>Usuarios</span>
                </a>
            </li>
        @endcan
        @can('Monedas_Ver')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('coins') ? '' : 'collapsed' }}" href="{{ route('coins') }}">
                    <i class="bi bi-coin"></i> <span>Monedas</span>
                </a>
            </li>
        @endcan
        @can('Arqueos_Ver')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cashout') ? '' : 'collapsed' }}" href="{{ route('corteCaja') }}">
                    <i class="bi bi-currency-dollar"></i> <span>Arqueos</span>
                </a>
            </li>
        @endcan
        @can('Reportes_Ver')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('report') ? '' : 'collapsed' }}" href="{{ route('reportes') }}">
                    <i class="bi bi-pie-chart-fill"></i> <span>Reportes</span>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link collapsed" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Cerrar sesión</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>
        </li>
    </ul>
</aside>
