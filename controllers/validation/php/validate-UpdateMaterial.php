<?php

/********************************************************
 * Archivo: realiza la configuracion para deshabilitrar/*
 *          habilitar un material y editarlo            *
 * Author: Iván                                         *
 * Date: 10/03/23                                       *   
 *******************************************************/

//DESHABILITAR A UN MATERIAL\
if (isset($_POST['cambio'])) {
    
    //Recibiendo en ID del material a deshabilitar
    $id = $_POST['idMaterial'];
    $estado = $_POST['estadoMaterial'];

    //Instancia de la clase DeshabilitarMaterial para realizar el registro.
    $UpdateMaterial = new UpdateMaterial();
    if ($UpdateMaterial->toggleEstadoMaterial($id, $estado)) {
        if ($estado == 1) {
            echo '<script language="javascript">
                alert("Material Deshabilitado");
                </script>';
        } else {
            echo '<script language="javascript">
                alert("Material habilitado");
                </script>';
        }
    } else {
        echo '<script language="javascript">
                alert("Error al cambiar estado");
                </script>';
    }
}






//ACTUALIZAR A UN MATERIAL
if (isset($_POST['editar'])) {
    //url de la pestaña admin update user
    $adminUpdateUser = 'admin-update-user.php';

    $userId = $_POST['idUser'];
    //Redireccionando a la página con el id del material que se va a editar.
    header("location: $adminUpdateUser?id=$userId");
    die();
}

    //Actualizar datos de material
   /* if (isset($_POST['actualizar'])) {
        //Obtener datos que se van a actualizar.
        $idUser = $_POST['idUser'];
        $nombre = $_POST['nombreUser'];
        $apaterno = $_POST['apaternoUser'];
        $amaterno = $_POST['amaternoUser'];
        $correo = $_POST['correoUser'];
        $rol = $_POST['rolUser'];
        $sede = $_POST['sedeUser'];

        //Crear array para los datos
        $datosUser = array(
            'UserId' => $idUser,
            'NombreUser' => $nombre,
            'ApaternoUser' => $apaterno,
            'AmaternoUser' => $amaterno,
            'CorreoUser' => $correo,
            'RolUser' => $rol,
            'SedeUser' => $sede
        );

        //Llamar al metodo para actualizar datos
        $UpdateUser = new UpdateUser();
        if($UpdateUser -> actualizarMaterial($datosUser)){
            echo '<script language="javascript">
                alert("Datos Actualizados con exito");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
            die();
        }else{
            echo '<script language="javascript">
                alert("Error al acutalizar datos de Material");
                </script>';
        }
    } elseif (isset($_POST['cancelar'])) {
        echo '<script language="javascript">
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        die();
    }*/
