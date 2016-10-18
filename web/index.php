<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'usuariosActivos.php'; ?>
<html>
    <head>
        <?php require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '_partials' . DIRECTORY_SEPARATOR . 'head.php'; ?> 
    </head>
    <body>
        <?php require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '_partials' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <strong>Usuarios Activos</strong>  <button class="btn btn-primary" type="submit"><?php echo usuarios_activos(); ?> </button>
        <?php require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '_partials' . DIRECTORY_SEPARATOR . 'footer.php'; ?> 

    </body>

</html>


