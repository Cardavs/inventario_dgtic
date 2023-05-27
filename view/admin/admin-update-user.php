<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);
include(BD_UPDATE . 'update-user.php');


$correo = $_GET['correo'];
$nombreCompleto = $_GET['nombre'];
$rol = $_GET['rol'];
$sede = $_GET['sede'];
$id = $_GET['id'];
//url de la pestaña manage account
$manageAccount = 'manage-account.php';

if(isset($_POST['actualizar'])){

    //Obtener datos que se van a actualizar.
    $nombreCompletoUpdate = explode(" ", $_POST['NombreUser']);//SEPARAR STRINGS POR ESPACIOS  

    //ALMACENAR LOS STRINGS SEPARADOS EN VARIABLES
    $nombreUpdate = $nombreCompletoUpdate[0];
    $apaternoUpdate = $nombreCompletoUpdate[1];

    //Si ingresa el apellido materno lo asigna si no lo deja vacio.
    if(isset($nombreCompletoUpdate[2])){
        $amaternoUpdate = $nombreCompletoUpdate[2];
    }else{
        $amaternoUpdate = " ";
    }

    $correoUpdate = trim($_POST['usuarioCorreo'], ' \t\n\r\0\x0B');
    $rolUpdate = $_POST['usuarioRol'];
    $sedeUpdate = $_POST['usuarioSede'];

    // almacenar en un array todos los valores ya limpios.
    $updateUserdata = array (
        'id' => $id,
        'nombre' => $nombreUpdate,
        'apaterno' => $apaternoUpdate,
        'amaterno' => $amaternoUpdate,
        'correo' => $correoUpdate,
        'rol' => $rolUpdate,
        'sede'=> $sedeUpdate,
    );
        
    //Instancia de la clase actulazarDataUser para realizar el registro.
    $UpdateUser = new UpdateUser();
    if($UpdateUser->actulazarDataUser($updateUserdata)){
        header("location: $manageAccount");
        die();
    }else{
        echo 'error';
    }
}elseif(isset($_POST['cancelar'])){
    header("location: $manageAccount");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
    <?php 
        include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
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

                    </th>
                </tr>
            </thead>

            <tbody>
                <form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate>
                    <tr class="usuario">
                        <th scope="col">
                            <input type="text" class="form-control form-control-lg g-3" name="NombreUser" value="<?php echo $nombreCompleto?>">
                        </th>
                        <td>
                            <input type="text" class="form-control form-control-lg" name="usuarioCorreo" value="<?php echo $correo?> ">
                        </td>
                        <td>
                            <select class="form-select form-select-lg mb-3 form-control-lg" name="usuarioRol" aria-label="" required>
                                <option <?php echo ($rol == 'CE') ? "selected" : " "?> value="CE">Control Escolar</option>
                                <option <?php echo ($rol == 'Consultor') ? "selected" : " "?> value="Consultor">Consultor</option>
                                <option <?php echo ($rol == 'editor') ? "selected" : " "?> value="Editor">Editor</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-lg mb-3 form-control-lg" name="usuarioSede" aria-label=".form-select-lg example" required>
                                <option <?php echo ($sede == 'Centro Mascarones') ? "selected" : " "?> value="1">Centro Mascarones</option>
                                <option <?php echo ($sede == 'Ciudad Universitaria') ? "selected" : " "?> value="2">Ciudad Universitaria</option>
                                <option <?php echo ($sede == 'Centro Polanco') ? "selected" : " "?> value="3">Centro Polanco</option>
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