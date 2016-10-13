<nav class="navbar navbar-default" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Men&uacute;</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../web/index.php">Inicio</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Post<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a onclick="cambiarVentana('Post','new')"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Crear Post</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('Post','edit')"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Editar Post</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('Post','delete')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Eliminar Post</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('Post','list')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Listar Post</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    User<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a onclick="cambiarVentana('User','new')"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Crear usuario</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('User','edit')"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Editar Usuario</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('User','delete')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Eliminar Usuario</a></li>
                    <li class="divider"></li>
                    <li><a onclick="cambiarVentana('User','list')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Listar Usuarios</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

