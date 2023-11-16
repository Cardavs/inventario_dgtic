<?php

/****************************
 * pantalla: crear usuario   *
 * date: 29/02/2023          *
 * autor: Roan               *
 *****************************/
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'administrador') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>

<!DOCTYPE html>
<html lang="es">
    <?php include(VALIDATION_PHP . '/validate-createUser.php'); ?>
    <?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <h2 class="titulo">CREAR USUARIO</h2>
    <form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Nombre">Nombre</label>
                <input id="Nombre" name="Nombre" class="form-control form-control-lg" type="text" placeholder="Nombre" required>
                <div class="invalid-feedback">
                    Es necesario colocar un nombre.
                </div>
            </div>
            <div class="col">
                <label for="Apellido Paterno">Apellido Paterno</label>
                <input name="aPaterno" class="form-control form-control-lg" type="text" placeholder="Apellido Paterno" required> 
                <div class="invalid-feedback">
                    Es necesario colocar un apellido paterno.
                </div>
            </div>
            <div class="col">
                <label for="Apellido Materno">Apellido Materno</label>
                <input name="aMaterno" class="form-control form-control-lg" type="text" placeholder="Apellido Materno" required>
                <div class="invalid-feedback">
                        Es necesario colocar un apellido materno.
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Sede">Sede</label>
                <select class="form-select form-select-lg mb-3" name="sede" aria-label=".form-select-lg example" required>
                    <option selected disabled value="">Selecciona una Sede</option>
                    <option value="1">Centro Mascarones</option>
                    <option value="2">Ciudad Universitaria</option>
                    <option value="3">Centro Polanco</option>
                </select>
                <div class="invalid-feedback">
                        Es necesario elegir una sede.
                </div>
            </div>
            <div class="col">
                <label for="Sede">Rol de usuario</label>
                <select class="form-select form-select-lg mb-3" name="rol" aria-label="" required>
                    <option selected disabled value="">Selecciona un rol</option>
                    <option value="CE">Control Escolar</option>
                    <option value="Editor">Editor</option>
                </select>
                <div class="invalid-feedback">
                    Es necesario elegir un tipo de usuario.
                </div>
            </div>
        </div>
        <div class="row g-9 mb-3">
            <div class="col">
                <label for="Correo">Correo</label>
                <input name="correo" class="form-control form-control-lg" type="email" placeholder="Correo" aria-label=".form-control-lg example" required>
                <div class="invalid-feedback">
                    Es necesario colocar un correo.
                </div>
            </div>
            <div class="col">
                <label for="Password">Contraseña</label>
                <input name="password" id="resultadoPassword" pattern=".{8}.*" class="form-control form-control-lg" type="text" placeholder="Password" aria-label=".form-control-lg example" required>
                <div class="invalid-feedback">
                    Es necesario colocar una contraseña.
                </div>
            </div>
            <div class="col">
                <label for="generarPassword"> </label>
                <button class="btn btn-primary generarPswd p-3" type="button" onclick="generarPassword()"> Generar Contraseña </button>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-12 btn-pass">
                <label for="CrearUsuario"> </label>
                <button name="CrearUsuario" class="btn btn-primary botonCreateuser" type="submit" value="createUser">Crear Usuario</button>
            </div>
        </div>
    </form>
    <script src="/inventario_dgtic/controllers/password/generate-password.js" type="text/javascript"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>