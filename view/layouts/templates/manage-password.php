<?php
include(BD_UPDATE . 'update-user.php');
include(BD_SELECT . 'select-users.php');
?>

<h2 class="titulo mb-4">Cambiar Contraseña</h2>
<div class="container text-center">
    <form class="formulario g-3 needs-validation" novalidate method="POST" action="">
        <div class="mb-3 col ">
            <label for="oldPassword" class="form-label">Contraseña Anterior</label>
            <div class="col-md-6 offset-md-3">
                <input type="text" name="oldPassword" class="form-control" placeholder="Contraseña anterior" required>
                <div class="invalid-feedback">
                    Es necesario escribir la contraseña anterior.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Nueva Contraseña</label>
            <div class="col-md-6 offset-md-3">
                <input type="password" name="newPassword" class="form-control" placeholder="Nueva Contraseña" required>
                <div class="invalid-feedback">
                    Es necesario escribir una contraseña nueva.
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="newPasswordConfirm" class="form-label">Confirmar contraseña</label>
            <div class="col-md-6 offset-md-3">
                <input type="password" name="newPasswordConfirm" class="form-control" placeholder="Confirmar Contraseña" required>
                <div class="invalid-feedback">
                    Es necesario confirmar la contraseña
                </div>
            </div>
        </div>
        <!-- <div class="row g-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <input class="form-control" type="text" value="Captcha" aria-label="Captcha" disabled readonly>
            </div>
        </div> -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <button type="submit" id="EditPassword" name="EditPassword"  class="btn btn-primary botonCreateuser">Cambiar Contraseña</button>
            </div>
        </div>
    </form>
    <?php
        include(VALIDATION_PHP . '/validate-updatePassword.php');
    ?>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
</div>