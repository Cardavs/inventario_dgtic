<?php

/**********************
 * pantalla: logIn     *
 * date: 28/02/2023    *
 * autor: Roan         *
 ***********************/
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(VALIDATION_PHP . '/validate-login.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
        <form class="container col-sm-4 formulario needs-validation mt-5" method="post" novalidate>
            <div class="col mb-5">
                <label for="correo">Ingrese su Correo electrónico</label>
                <input id="correo" name="correo" class="form-control form-control-lg" type="email" placeholder="Correo Electrónico" required>
                <div class="invalid-feedback">
                    No es un correo electrónico válido o es necesario colocarlo.
                </div>
            </div>
            <div class="col mb-5">
                <label for="password">Ingrese su Contraseña</label>
                <input name="password" class="form-control form-control-lg" type="password" placeholder="Contraseña" required>
                <div class="invalid-feedback">
                    Es necesario colocar su Contraseña.
                </div>
            </div>
            <div class="row justify-content-sm-center btn-pass">
                <button name="login" class="btn btn-primary botonCreateuser" type="submit" value="login">Iniciar Sesión</button>
            </div>
        </form>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>