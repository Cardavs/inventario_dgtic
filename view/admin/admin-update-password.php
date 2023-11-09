<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);

include(BD_UPDATE . 'update-user.php');
include(BD_SELECT . 'select-users.php');
//Archivo para actualizar al usuario
include(VALIDATION_PHP . '/validate-UpdateUser.php');
//Obtieniendo Id del usuario para mostrar datos.
$id = $_GET['id'];

//Instanciando clase para obtener datos del usuario.
$datosUser = new SelectUser();

//Llamando a la funcion para realizar el select del usuario a editar
$userInfo = $datosUser->getDatosUserById($id);
?>
<!DOCTYPE html>
<html lang="es">
<?php
include(LAYOUT . '/head.php');
?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <h2 class="titulo">Editar Contraseña</h2>
    <form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate>
        <div class="row g-3 mb-3">
            <input type="hidden" class="form-control form-control-lg g-3" name="idUser" value="<?php echo $userInfo['Usuario_Id'] ?>">
            <div class="col">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control form-control-lg g-3" name="Nombre" value="<?php echo $userInfo['UsuarioNombre'] ?>" readonly>
            </div>
            <div class="col">
                <label for="apaternoUser">Apellido Paterno</label>
                <input type="text" class="form-control form-control-lg g-3" name="apaternoUser" value="<?php echo $userInfo['UsuarioApaterno'] ?>" readonly>
            </div>
            <div class="col">
                <label for="amaternoUser">Apellido Materno</label>
                <input type="text" class="form-control form-control-lg g-3" name="amaternoUser" value="<?php echo $userInfo['UsuarioAmaterno'] ?>" readonly>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Sede">Sede</label>
                <select class="form-select form-select-lg mb-3 form-control-lg" name="Sede" aria-label=".form-select-lg example" disabled>
                    <option <?php echo ($userInfo['sedeNombre'] == 'Centro Mascarones') ? "selected" : " " ?> value="1">Centro Mascarones</option>
                    <option <?php echo ($userInfo['sedeNombre'] == 'Ciudad Universitaria') ? "selected" : " " ?> value="2">Ciudad Universitaria</option>
                    <option <?php echo ($userInfo['sedeNombre'] == 'Centro Polanco') ? "selected" : " " ?> value="3">Centro Polanco</option>
                </select>
            </div>
            <div class="col">
                <label for="Rol">Rol de usuario</label>
                <select class="form-select form-select-lg mb-3 form-control-lg" name="Rol" aria-label="" disabled>
                    <option <?php echo ($userInfo['UsuarioRol'] == 'CE') ? "selected" : " " ?> value="CE">Control Escolar</option>
                    <option <?php echo ($userInfo['UsuarioRol'] == 'Consultor') ? "selected" : " " ?> value="Consultor">Consultor</option>
                    <option <?php echo ($userInfo['UsuarioRol'] == 'editor') ? "selected" : " " ?> value="editor">Editor</option>
                </select>
            </div>
        </div>
        <div class="row g-9 mb-3">
            <div class="col">
                <label for="Correo">Correo</label>
                <input type="email" class="form-control form-control-lg" name="Correo" value="<?php echo $userInfo['UsuarioCorreo'] ?> " aria-label=".form-control-lg example" readonly>

            </div>
            <div class="col">
                <label for="password">Contraseña</label>
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
                <button name="EditPassword" class="btn btn-primary botonCreateuser btn-tabla" type="submit" value="EditPass">Editar Contraseña</button>

                <label for="cancelar"> </label>
                <input name="cancelar" type="button" class="btn btn-primary botonCreateuser btn-tabla" value="Cancelar" onclick="cancelarFormulario()">
            </div>
        </div>
    </form>

    <script src="/inventario_dgtic/controllers/password/generate-password.js" type="text/javascript"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>