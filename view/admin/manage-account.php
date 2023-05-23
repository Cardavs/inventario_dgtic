<?php

/*********************************
 * pantalla: administrar cuentas *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);
include(BD_SELECT . 'select-users.php');
include(VALIDATION_PHP . '/validate-deshabilitarUser.php');

//Instancia para la consulta de datos de usuario
$datosUser = new SelectUser();
$userInfo = $datosUser -> getDatosUser();
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <h2 class="titulo">Gestionar Cuentas</h2>

    <div class="container">
        <form class="d-flex col-md-2 form-search needs-validation text-container" role="search" novalidate>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
            <div class="invalid-feedback">
                Es necesario colocar un filtro.
            </div>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>

    <div class="container sombra">
        <table class="table tabla-cuenta">
            <thead class="encabezado">
                <tr>
                    <th scope="col" class="encabezado-col">
                        Nombre
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
                        Estado
                    </th>
                    <th scope="col" class="encabezado-col">  

                    </th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    foreach($userInfo as $userInfo){
                ?>
                <form action="" method="post">
                    <tr class="usuario">
                        <th scope="col">
                            <input type="text" readonly class="form-control-plaintext" name="NombreUser" value="<?php echo $userInfo['UsuarioNombre'] . ' ' . $userInfo['UsuarioApaterno'] . ' ' . $userInfo['UsuarioAmaterno']; ?>">
                        </th>
                        <td>
                            <input type="text" readonly class="form-control-plaintext" name="usuarioCorreo" value="<?php echo $userInfo['UsuarioCorreo'];?>">
                        </td>
                        <td>
                            <input type="text" readonly class="form-control-plaintext" name="usuarioRol" value="<?php echo $userInfo['UsuarioRol'];?>">
                        </td>
                        <td>
                            <input type="text" readonly class="form-control-plaintext" name="usuarioSede" value="<?php echo $userInfo['sedeNombre']; ?>">
                        </td>
                        <td>
                            <?php echo ($userInfo['UsuarioEstado'] == 1) ? "Activo" : "Inactivo"; ?>
                        </td>
                        <td class="btn-tabla-container">
                            <button name="habilitar" type="submit" class="btn btn-primary btn-tabla">Habilitar</button>
                            <button name="deshabilitar" type="submit" class="btn btn-primary btn-tabla">Deshabilitar</button>
                            <button name="editar" type="submit" class="btn btn-primary btn-tabla">Editar</button>
                            <button name="eliminar" type="submit" class="btn btn-primary btn-tabla">Eliminar</button>
                        </td>
                    </tr>
                </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>