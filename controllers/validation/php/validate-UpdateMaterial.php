<?php

/********************************************************
 * Archivo: realiza la configuracion para deshabilitrar/*
 *          habilitar un material y editarlo            *
 * Author: Iván                                         *
 * Date: 10/03/23                                       *   
 *******************************************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);
require_once(BD_SELECT . 'select-material.php');
require_once(BD_UPDATE . 'update-material.php');



//CAMBIAR ESTADO DE UN MATERIAL\
if (isset($_POST['cambio'])) {

    //Recibiendo en ID del material a deshabilitar
    $id = $_POST['idMaterial'];
    $estado = $_POST['estadoMaterial'];

    //Instancia de la clase DeshabilitarMaterial para realizar el registro.
    $UpdateMaterial = new UpdateMaterial();
    if ($UpdateMaterial->toggleEstadoMaterial($id, $estado)) {
        if ($estado) {
            $message = "Material Deshabilitado";
        } else {
            $message = "Material habilitado";
        }
    } else {
        $message = "Error al cambiar estado";
    }
    $_SESSION['message'] = $message;
    header("Location: /inventario_dgtic/view/admin/manage-material.php");
    exit;
}






//ACTUALIZAR A UN MATERIAL
if (isset($_POST['editar'])) {
    //url de la pestaña admin update user
    $adminUpdateMaterial = '/inventario_dgtic/view/admin/admin-update-material.php';

    $id = $_POST['idMaterial'];
    //Redireccionando a la página con el id del material que se va a editar.
    header("location: $adminUpdateMaterial?id=$id");
    die();
}

//Actualizar datos de material
if (isset($_POST['actualizar'])) {
    $UpdateMaterial = new UpdateMaterial();
    //Crear array para los datos y notiicacion de tipo de material
    $datosMaterial = array(
        'idMaterial' => $_POST['idMaterial'],
        'NombreMaterial' => $_POST['nombreMaterial'],
        'Autor' => $_POST['autor'],
        'VersionM' => $_POST['version'],
        'AnioEdicion' => $_POST['anioEdicion'],
        'NoPaginas' => $_POST['noPaginas'],
        'Area' => $_POST['area'],
        'Isbn' => $_POST['tipo'] == "Auditoría" ? $_POST['ISBN'] : null,
        'Tiraje' => $_POST['tipo'] == "Auditoría" ? $_POST['Tiraje'] : null,
        'cambioNombre' => $_POST['nombreViejo'] == $_POST['nombreMaterial'] ? false : true
    );


    /*TOMA EN CUENTA QUE UNA ACTUALIZACION DE LOS 
        ARCHIVOS DE INDICE O MATERIAL SOLO INVOLUCRA 
        REEMPLAZAR EL ARCHIVO Y NO UN UPDATE A LA BD
        
        CONSIDERA QUE SI SE CAMBIA EL NOMBRE, SE DEBE
        CAMBIAR TAMBIEN EL NOMBRE DEL ARCHIVO Y LA RUTA
        AKMACENADA
        */


    if (is_uploaded_file($_FILES['material']['tmp_name']) && filesize($_FILES['material']['tmp_name']) > 0 && $_FILES['material']['error'] === 0) {
        // Al menos uno de los dos campos ('material' o 'indice') contiene un archivo y no hay errores.
        /**
         * DEFINIR QUE ARCHIVO SE ACTUALIZARA O AMBOS
         * SUBES ARCHIVO Y DAS FORMATO
         * COMPRUEBAS SI CAMBIO NOMBRE
         */
        $nombreActual = $_FILES['material']['name'];
        $nombreReal = $_POST['nombrePDF'];
        $rutaArchivoPDF = __DIR__ . "/../../../material/pdf/" . $nombreReal;
        
        if (move_uploaded_file($_FILES['material']['tmp_name'], $rutaArchivoPDF)) {
            echo '<script language="javascript">
                alert("PDF Actualizado");
                </script>';
        }
    } else {
        echo '<script language="javascript">
                alert("PDF de material no se cargo, es menor a 1 MB, o hubo un error en la carga, se seguira con la edición sin tocar este archivo");
                </script>';
    }
    if (is_uploaded_file($_FILES['indice']['tmp_name']) && filesize($_FILES['indice']['tmp_name']) > 0 && $_FILES['indice']['error'] === 0) {
        $nombreActual = $_FILES['indice']['name'];
        $nombreReal = $_POST['nombreIndice'];
        $rutaArchivoPDF = __DIR__ . "/../../../material/indice/" . $nombreReal;
        
        if (move_uploaded_file($_FILES['indice']['tmp_name'], $rutaArchivoPDF)) {
            echo '<script language="javascript">
                alert("Indice PDF Actualizado");
                </script>';
        }
    } else {
        echo '<script language="javascript">
                alert("PDF de Indice no se cargo, es menor a 1 MB, o hubo un error en la carga, se seguira con la edición sin tocar este archivo");
                </script>';
    }


    //Llamar al metodo para actualizar datos
    if ($UpdateMaterial->actualizarMaterial($datosMaterial)) {
        echo '<script language="javascript">
                alert("Datos Actualizados con exito");
                window.location.href = "/inventario_dgtic/view/admin/manage-material.php";
                </script>';
            /*die()*/;
    } else {
        echo '<script language="javascript">
                alert("Error al acutalizar datos de Material");
                </script>';
    }
} else if (isset($_POST['cancelar'])) {
    echo '<script language="javascript">
        alert("Salio");
        </script>';
    header("Location: /inventario_dgtic/view/admin/manage-material.php");
    // die();
}
