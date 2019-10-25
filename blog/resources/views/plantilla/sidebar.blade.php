<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
                    </li>
                    <li class="nav-title">
                        Mantenimiento
                    </li>
                    <li  class="nav-item nav-dropdown">
                        <a @click="menu=1" class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Almacén</a>
                        <ul class="nav-dropdown-items">
                            <li @click="menu=2" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-bag"></i> Categorías</a>
                            </li>
                            <li @click="menu=3" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-bag"></i> Artículos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-wallet"></i> Compras</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="icon-wallet"></i> Ingresos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-notebook"></i> Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket"></i> Ventas</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="icon-basket-loaded"></i> Ventas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-notebook"></i> Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="icon-user"></i> Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reportes</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="icon-chart"></i> Reporte Ingresos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i> Reporte Ventas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main.html"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>