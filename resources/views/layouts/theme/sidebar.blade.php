<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }}" href="#">
                <i class="bi bi-grid"></i> <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-heading">Páginas</li>
        <li class="nav-item">
            <a class="nav-link  {{ request()->is('categories') ? '' : 'collapsed' }} " href="{{ route('categorias') }}">
                <i class="bi bi-bar-chart-steps"></i> <span>Categorias</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('products') ? '' : 'collapsed' }}" href="{{ route('productos') }}">
                <i class="bi bi-bag-dash"></i> <span>Productos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-cart3"></i> <span>Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-key"></i> <span>Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-ui-checks"></i> <span>Permisos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-eye"></i> <span>Asignar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-people"></i> <span>Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('coins') ? '' : 'collapsed' }}" href="{{ route('coins') }}">
                <i class="bi bi-coin"></i> <span>Monedas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-currency-dollar"></i> <span>Arqueos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-pie-chart-fill"></i> <span>Reportes</span>
            </a>
        </li>
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
