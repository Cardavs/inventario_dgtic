<?php

/****************************
 * pantalla: crear usuario   *
 * date: 29/02/2023          *
 * autor: Roan               *
 *****************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <h2 class="titulo">CREAR USUARIO</h2>
    <form class="container col-md-12 col-sm-4 formulario" action="" method="post">
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Nombre">Nombre</label>
                <input name="Nombre" class="form-control form-control-lg" type="text" placeholder="Nombre">
            </div>
            <div class="col">
                <label for="Apellido Paterno">Apellido Paterno</label>
                <input name="Apellido Paterno" class="form-control form-control-lg" type="text" placeholder="Apellido Paterno">
            </div>
            <div class="col">
                <label for="Apellido Materno">Apellido Materno</label>
                <input name="Apellido Materno" class="form-control form-control-lg" type="text" placeholder="Apellido Materno">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Sede">Sede</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled default>Selecciona una Sede</option>
                    <option value="1">Ciudad Universitaria</option>
                    <option value="2">Centro Mascarones</option>
                    <option value="3">Centro Polanco</option>
                </select>
            </div>
            <div class="col">
                <label for="Sede">Sede</label>
                <select class="form-select form-select-lg mb-3" aria-label="">
                    <option selected disabled>Selecciona un rol</option>
                    <option selected>Control Escolar</option>
                    <option value="1">Consultor</option>
                    <option value="2">Editor</option>
                </select>
            </div>
        </div>
        <div class="row g-9 mb-3">
            <div class="col">
                <label for="Correo">Correo</label>
                <input name="Correo" class="form-control form-control-lg" type="email" placeholder="Correo" aria-label=".form-control-lg example">
            </div>
            <div class="col">
                <label for="Password">Contraseña</label>
                <input name="Password" class="form-control form-control-lg" type="password" placeholder="Password" aria-label=".form-control-lg example">
            </div>
            <div class="col">
                <label for="generarPassword"> </label>
                <input name="generarPassword" class="btn btn-primary generarPswd" type="submit" value="Generar Contraseña">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <label for="CrearUsuario"> </label>
                <input name="CrearUsuario" class="btn btn-primary botonCreateuser" type="submit" value="Crear Usuario">
            </div>
        </div>

    </form>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>