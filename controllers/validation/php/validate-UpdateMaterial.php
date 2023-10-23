<?php

/********************************************************
 * Archivo: realiza la configuracion para deshabilitrar/*
 *          habilitar un material y editarlo            *
 * Author: Iván                                         *
 * Date: 10/03/23                                       *   
 *******************************************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);
include(BD_UPDATE . 'update-material.php');
session_start();


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

        //Crear array para los datos y notiicacion de tipo de material
        $datosMaterial = array(
            'idMaterial' => $_POST['idMaterial'],
            'NombreMaterial' => $_POST['nombreMaterial'],
            'Autor' => $_POST['autor'],
            'VersionM' => $_POST['version'],
            'AnioEdicion' => $_POST['anioEdicion'],
            'NoPaginas' => $_POST['noPaginas'],
            'Area' => $_POST['area'],
            'Isbn' => null,
            'Tiraje'=>null
        );

        if($_POST['tipo']=="Auditoría"){
            $datosMaterial['Isbn'] = $_POST['ISBN'];
            $datosMaterial['Tiraje']=$_POST['Tiraje'];
        }else{
            
        }
        /*TOMA EN CUENTA QUE UNA ACTUALIZACION DE LOS 
        ARCHIVOS DE INDICE O MATERIAL SOLO INVOLUCRA 
        REEMPLAZAR EL ARCHIVO Y NO UN UPDATE A LA BD
        
        CONSIDERA QUE SI SE CAMBIA EL NOMBRE, SE DEBE
        CAMBIAR TAMBIEN EL NOMBRE DEL ARCHIVO Y LA RUTA
        AKMACENADA
        */
        

        //Llamar al metodo para actualizar datos
        $UpdateMaterial = new UpdateMaterial();
        if($UpdateMaterial -> actualizarMaterial($datosMaterial)){
            echo '<script language="javascript">
                alert("Datos Actualizados con exito");
                window.location.href = "/inventario_dgtic/view/admin/manage-material.php";
                </script>';
            /*die()*/;
        }else{
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
