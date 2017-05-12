    <header class="cd-main-header">
        <a href="#0" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>

        <div class="cd-search is-hidden">
            <form action="#0">
                <input type="search" placeholder="Buscar...">
            </form>
        </div> <!-- cd-search -->

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">
                <li><a href="#0">Inicio</a></li>
                <li><a href="#0">Ayuda</a></li>
                <li class="has-children account">
                    <a href="#0">
                        <img src="img/cd-avatar.png" alt="avatar">
                        <?php echo $_SESSION["nombreusr"];   ?>
                    </a>

                    <ul>
                        <li><a href="#0">Editar cuenta</a></li>
                        <li><a href="seguridad/cerrar.php"><i class=\"fa fa-ban fa-fw pull-right\"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header> <!-- .cd-main-header -->

    <main class="cd-main-content">
        <nav class="cd-side-nav">
            <ul>
                <li class="cd-label">Opciones</li>
                <li class="has-children overview">
                    <a href="#0">Menu de comida</a>

                    <ul>
                        <li><a href="comidaGeneral.php?op=x&tip=x">Todos</a></li>

                        <li><a href="comidaGeneral.php?op=x&tip=Bebidas">Bebidas</a></li>
                        <li><a href="comidaGeneral.php?op=x&tip=Postres">Postres</a></li>
                        <li><a href="comidaGeneral.php?op=x&tip=Precios">Precios</a></li>
                        <li><a href="comidaGeneral.php?op=x&tip=Bebidas">Favoritos</a></li>
                        <li><a href="proveedoresCategorias.php?op=x">Categorias</a></li>
                    </ul>
                </li>
            <li class="has-children users">
                    <a href="#0">Pedidos</a>

                    <ul>
                        <li><a href="pedidos_pendientes.php?op=x&tip=x">Pendientes</a></li>
                        <li><a href="pedidos_pendientes.php?op=x&tip=ac">Activados</a></li>
                        <li><a href="pedidos_entregados.php?op=x&tip=x">Entregados</a></li>
                    </ul>
                </li>



                <li class="has-children comments">
                    <a href="#0">Estadisticas</a>

                    <ul>
                        <li><a href="estadisticas_mensuales.php">Estadisticas mensuales</a></li>
                        <li><a href="estadisticas_semanales.php">Estadisticas semanales</a></li>
                        <li><a href="ganancias.php?op=x&tip=x">Ganancias</a></li>
                        <li><a href="top.php">Top mas vendido</a></li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li class="cd-label">Personas</li>
                <li class="has-children bookmarks">
                    <a href="#0">Clientes</a>
                    <ul>
                        <li><a href="clientesGeneral.php?op=x">Todos</a></li>
                        <li><a href="clientesRegistrados.php">Clientes Registrados</a></li>
                        <li><a href="clientesFrecuentes.php">Clientes Frecuentes</a></li>

                    </ul>

                <li class="has-children images">
                    <a href="#0">Proveedores</a>

                    <ul>
                        <li><a href="proveedores.php?op=x">Proveedores</a></li>
                        <li><a href="proveedoresInsumos.php?op=x">Insumos</a></li>
                        <li><a href="proveedoresProductos.php?op=x">Productos</a></li>
                    </ul>
                </li>

                <li class="has-children users">
                    <a href="#0">Usuarios</a>

                    <ul>
                        <li><a href="usuariosGeneral.php">Todos</a></li>
                        <li><a href="usuariosCajeros.php">Cajeros</a></li>
                        <li><a href="UsuariosAdministradores.php">Administradores</a></li>
                        <li><a href="usuariosClientes.php">Clientes</a></li>
                        <li><a href="empleadodelmes.php">Empleados del mes</a></li>
                    </ul>
                </li>
                <li>
                  <li class="has-children users">
                <a href="#0">Caja chica</a>
                </li>
            </ul>


        </nav>
