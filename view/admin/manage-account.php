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

//Instancia para la consulta de datos de usuario
$datosUser = new SelectUser();

//Trae todos los usuarios registrados en la base de datos.
$userInfo = $datosUser->getDatosUser();
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
                                <button type="submit" name="habilitar" class="btn btn-primary btn-tabla">Habilitar</button>
                                <button type="submit" name="deshabilitar" class="btn btn-primary btn-tabla">Deshabilitar</button>
                                <button type="submit" name="editar" class="btn btn-primary btn-tabla">Editar</button>
                                <button type="submit" name="eliminar" class="btn btn-primary btn-tabla">Eliminar</button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- <script>

        $(document).ready( function () {
            $('#myTable').DataTable({
                "responsive": true,
                "pagingType": "simple_numbers",
                "columnDefs": [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [-1]
                    },

                    { 
                        "visible": false, 
                        "targets": 0 
                    },
                ]
            });
        } );

    </script> -->
    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>