<?php

/*********************************
 * pantalla: descargar material  *
 * date: 11/11/2023              *
 * autor: Iván                   *
 *********************************/

session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'administrador') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);

include(BD_SELECT . 'select-material.php');
include(BD_SELECT . 'select-section.php');

//Obtieniendo Id del usuario para mostrar datos.
$id = $_GET['id'];

//Instanciando clase para obtener datos del usuario.
$datosMaterial = new SelectMaterials();
$datoSeccion = new SelectSection();

//Llamando a la funcion para realizar el select del usuario a editar
$materialInfo = $datosMaterial->getMaterialById($id);
$seccioninfo = $datoSeccion->getSectionById($materialInfo['Seccion_Id']);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php include(LAYOUT . "/head.php"); ?>
</head>

<body>
    <?php include(LAYOUT . "/header.php"); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>
    <h2 class="titulo">Descargar Material</h2>

    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT . "/templates/manage-download-material-template.php"); ?>

    <?php include(LAYOUT . "/footer.php"); ?>

    <script>
      /*  // JavaScript para redirigir después de enviar el formulario
        document.getElementById('descargaForm').addEventListener('submit', function() {
            setTimeout(function() {
                window.location.href = "manage-material.php";
            }, 2500); // Redirige después de 5 segundos
        });*/
    </script>
</body>

</html>