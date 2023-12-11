<?php
/*********************************
 * pantalla: Gestionar areas      *
 * date: 11/12/2023               *
 * autor: Iván                    *
 **********************************/

session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'editor') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(LAYOUT . "/head.php"); ?>
</head>

<body>
    <?php include(LAYOUT . "/header.php"); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>
    <?php
    include(BD_SELECT . 'select-section.php');
    include(BD_SELECT . 'select-area.php');
    include(VALIDATION_PHP . '/validate-update-area.php');
    //instancia de la clase SelectAreas
    $area = new SelectAreas();
    //Guardar el id del area a editar
    $areaId = $_GET['id'];
    //Guardar la información del area
    $infoArea = $area->getAreaById($areaId);
    $seccion = new SelectSection();
    $infoSecciones = $seccion->getSectionAll();
    ?>
    <h1 class="titulo">Editar Area</h1>
    <div class="container text-container sombra">
        <table class="table tabla-sede">
            <thead class="encabezado">
                <tr>
                    <th>Area</th>
                    <th>Seccion</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="post">
                    <tr>
                        <th>
                            <input type="text" name="areaNombre" class="form-control form-control-lg g-3" value="<?php echo $infoArea['AreaNombre']; ?>">
                        </th>
                        <td>
                            <select name="areaSeccion" id="areaSeccion">
                                <option value="" disabled>Seleccione una opcion</option>
                                <?php foreach ($infoSecciones as $infoSeccion) { ?>
                                    <option value="<?php echo $infoSeccion['Seccion_Id']; ?>" <?php echo ($infoSeccion['Seccion_Id']==$infoArea['Seccion_Id']?"selected":""); ?>  ><?php echo $infoSeccion['SeccionNombre'];?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="btn-tabla-container">
                            <input hidden type="text" name="idArea" value="<?php echo $areaId; ?>">
                            <button type="submit" name="actualizar" class="btn btn-primary btn-tabla">Actualizar</button>
                            <button type="submit" name="cancelar" class="btn btn-primary btn-tabla">Cancelar</button>
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