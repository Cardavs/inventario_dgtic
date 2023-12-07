<?php

/******************************************************
 * Archivo: Validar formulario para "Crear secciones" *
 * Author: Ivan                                       *
 * Date: 07/12/23                                     *
 *******************************************************/
$user = $_SESSION['rol'];
if ($user == 'administrador') {
    $user = "admin";
}
include(BD_INSERT . 'insert-area.php');
if (isset($_POST['addDiplomado'])) {
    //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
    //DESPUÉS SE ALMACENA EN UNA VARIABLE   
    $areaNombre = trim($_POST['areaName'], ' \t\n\r\0\x0');
    $seccionArea = $_POST['seccionArea'];
    $areaEstado = trim($_POST['areaEstado'], ' \t\n\r\0\x0');

    // almacenar en un array todos los valores ya limpios.
    $area = array(
        'areaNombre' => $areaNombre,
        'seccionArea' => $seccionArea,
        'areaEstado' => $areaEstado
    );

    //Instancia de la clase InsertArea para realizar el registro.
    $areaRegistro = new InsertArea();
    if ($areaRegistro->registrarArea($area)) {
        echo '<script language="javascript">
                alert("Area  Registrado Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
    } else {
        echo '<script language="javascript">
                alert("Error al Registrar Area. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
    }
}
