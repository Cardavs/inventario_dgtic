<?php

/*********************************
 * pantalla: administrar cuentas *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(BD_SELECT . 'select-users.php');

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
                <tr class="usuario">
                    <th scope="col">
                        <?php echo $userInfo['UsuarioNombre'] . ' ' . $userInfo['UsuarioApaterno'] . ' ' . $userInfo['UsuarioAmaterno']; ?>
                    </th>
                    <td>
                        <?php echo $userInfo['UsuarioCorreo'];?>
                    </td>
                    <td>
                        <?php echo $userInfo['UsuarioRol'];?>
                    </td>
                    <td>
                        <?php echo $userInfo['sedeNombre']; ?>
                    </td>
                    <td>
                        <?php if($userInfo['UsuarioEstado'] == 1){ 
                            echo 'Activo'; 
                            }elseif($userInfo['UsuarioEstado'] == 0){
                                echo 'Inactivo';
                            }  
                        ?>
                    </td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>