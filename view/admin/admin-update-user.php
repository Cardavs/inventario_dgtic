<?php
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'administrador') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
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

    <h2 class="titulo">Gestionar Cuentas</h2>
    <div class="container sombra">
        <table class="table tabla-cuenta">
            <thead class="encabezado">
                <tr>
                    <th scope="col" class="encabezado-col">

                    </th>
                    <th scope="col" class="encabezado-col">
                        Nombre
                    </th>
                    <th scope="col" class="encabezado-col">
                        Apellido Paterno
                    </th>
                    <th scope="col" class="encabezado-col">
                        Apellido Materno
                    </th>
                    <th scope="col" class="encabezado-col">
                        Correo
                    </th>
                    <th scope="col" class="encabezado-col">
                        Rol
                    </th>
                    <th scope="col" class="encabezado-col">
                        Sede
                    </th>
                    <th scope="col" class="encabezado-col">

                    </th>
                </tr>
            </thead>

            <tbody>
                <form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate>
                    <tr class="usuario">
                        <th scope="col">
                            <input type="hidden" class="form-control form-control-lg g-3" name="idUser" value="<?php echo $userInfo['Usuario_Id'] ?>">
                        </th>
                        <th scope="col">
                            <input type="text" class="form-control form-control-lg g-3" name="nombreUser" value="<?php echo $userInfo['UsuarioNombre'] ?>">
                        </th>
                        <th scope="col">
                            <input type="text" class="form-control form-control-lg g-3" name="apaternoUser" value="<?php echo $userInfo['UsuarioApaterno'] ?>">
                        </th>
                        <th scope="col">
                            <input type="text" class="form-control form-control-lg g-3" name="amaternoUser" value="<?php echo $userInfo['UsuarioAmaterno'] ?>">
                        </th>
                        <td>
                            <input type="text" class="form-control form-control-lg" name="correoUser" value="<?php echo $userInfo['UsuarioCorreo'] ?> ">
                        </td>
                        <td>
                            <select class="form-select form-select-lg mb-3 form-control-lg" name="rolUser" aria-label="" required>
                                <option <?php echo ($userInfo['UsuarioRol'] == 'CE') ? "selected" : " " ?> value="CE">Control Escolar</option>
                                <option <?php echo ($userInfo['UsuarioRol'] == 'editor') ? "selected" : " " ?> value="editor">Editor</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-lg mb-3 form-control-lg" name="sedeUser" aria-label=".form-select-lg example" required>
                                <option <?php echo ($userInfo['sedeNombre'] == 'Centro Mascarones') ? "selected" : " " ?> value="1">Centro Mascarones</option>
                                <option <?php echo ($userInfo['sedeNombre'] == 'Ciudad Universitaria') ? "selected" : " " ?> value="2">Ciudad Universitaria</option>
                                <option <?php echo ($userInfo['sedeNombre'] == 'Centro Polanco') ? "selected" : " " ?> value="3">Centro Polanco</option>
                            </select>
                        </td>
                        <td class="btn-tabla-container">
                            <button name="actualizar" type="submit" class="btn btn-primary btn-tabla">Actualizar</button>
                            <button name="cancelar" type="submit" class="btn btn-primary btn-tabla">Cancelar</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>