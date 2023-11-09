<?php

/*********************************
 * pantalla: administrar cuentas *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);

include(BD_SELECT . 'select-users.php');
include(BD_UPDATE . 'update-user.php');
include(VALIDATION_PHP . '/validate-UpdateUser.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>
<body>
    <?php
    include(LAYOUT . '/header.php');
    include(LAYOUT . "/navbar-users/navbarAdmin.php");
    ?>

    <h2 class="titulo">Gestionar Cuentas</h2>
    <div class="container search">
        <form class="d-flex col-md-2 form-search needs-validation text-container" role="search" novalidate method="POST">
            <input class="form-control me-2 text-center" type="text" placeholder="Busqueda por nombre, apellido o correo" name="Busqueda" id="Busqueda" required>
            <select class="form-select me-2 text-center" name="Filas" id="Filas" placeholder="Filas" required>
                <option value="">Filas a mostrar</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select>
            <div class="invalid-feedback">
                Es necesario colocar al menos un filtro.
            </div>
            <button class="btn btn-primary" type="submit" name="searchInput">Buscar</button>
        </form>
    </div>
    <?php
        include(VALIDATION_PHP . '/validate-searchUser.php');
    ?>
    <div class="container sombra">
        <table class="table tabla-cuenta text-container" id="myTable">
            <thead class="encabezado">
                <tr>
                    <th scope="col" class="encabezado-col">

                    </th>
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
                    <td scope="col" class="encabezado-col">
                    </td>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($userInfo as $userInfo) {
                ?>
                    <form action="" method="post">
                        <tr>
                            <th>
                                <input type="hidden" name="idUser" value="<?php echo $userInfo['Usuario_Id']; ?>">
                            </th>
                            <td scope="col">
                                <?php echo $userInfo['UsuarioNombre'] . ' ' . $userInfo['UsuarioApaterno'] . ' ' . $userInfo['UsuarioAmaterno']; ?>
                            </td>
                            <td>
                                <?php echo $userInfo['UsuarioCorreo']; ?>
                            </td>
                            <td>
                                <?php echo $userInfo['UsuarioRol']; ?>
                            </td>
                            <td>
                                <?php echo $userInfo['sedeNombre']; ?>
                            </td>
                            <td>
                                <?php echo ($userInfo['UsuarioEstado'] == 1) ? "Activo" : "Inactivo"; ?>
                            </td>
                            <td class="btn-tabla-container">
                                <button type="submit" name="editar" class="btn btn-primary btn-tabla">Editar</button>

                                <button type="submit" name="eliminar" class="btn btn-primary btn-tabla">Eliminar</button>

                                <button type="submit" name="<?php echo (!$userInfo['UsuarioEstado']) ? "habilitar" : "deshabilitar"; ?>" class="btn btn-primary btn-tabla <?php echo (!$userInfo['UsuarioEstado']) ? "btn-habilitar" : "btn-inhabilitar"; ?>"><?php echo (!$userInfo['UsuarioEstado']) ? "Habilitar" : "Inhabilitar"; ?></button>
                                
                                <button type="submit" name="editarPass" class="btn btn-primary btn-tabla">Editar Contraseña</button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include(LAYOUT . '/footer.php'); ?>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
</body>
</html>