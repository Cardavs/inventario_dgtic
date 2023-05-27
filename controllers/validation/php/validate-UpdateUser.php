<?php
    include(BD_UPDATE . 'update-user.php');
    /********************************************************
     * Archivo: realiza la configuracion para deshabilitrar *
     *          a un usuario                                *
     * Author: Roan                                         *
     * Date: 05/22/23                                       *  
     *******************************************************/

     //DESHABILITAR A UN USUARIO
    if(isset($_POST['deshabilitar'])){
        //SEPARAR STRINGS POR ESPACIOS
        $nombreCompleto = explode(" ", $_POST['NombreUser']);

        //ALMACENAR LOS STRINGS SEPARADOS EN VARIABLES
        $nombre = $nombreCompleto[0];
        $apaterno = $nombreCompleto[1];
        $amaterno = $nombreCompleto[2];

        $correo = $_POST['usuarioCorreo'];
        $rol = $_POST['usuarioRol'];
        // almacenar en un array todos los valores ya limpios.
        $deshabilitarUser = array (
            'nombre' => $nombre,
            'apaterno' => $apaterno,
            'amaterno' => $amaterno,
            'correo' => $correo,
            'rol' => $rol,
        );
        
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->deshabilitarUser($deshabilitarUser)){
            echo 'Usuario deshabilitado';
        }else{
            echo 'error';
        }
    }

    //HABILITAR A UN USUARIO
    if(isset($_POST['habilitar'])){
        //SEPARAR STRINGS POR ESPACIOS   
        $nombreCompleto = explode(" ", $_POST['NombreUser']);

        //ALMACENAR LOS STRINGS SEPARADOS EN VARIABLES
        $nombre = $nombreCompleto[0];
        $apaterno = $nombreCompleto[1];
        $amaterno = $nombreCompleto[2];

        $correo = $_POST['usuarioCorreo'];
        $rol = $_POST['usuarioRol'];
        // almacenar en un array todos los valores ya limpios.
        $deshabilitarUser = array (
            'nombre' => $nombre,
            'apaterno' => $apaterno,
            'amaterno' => $amaterno,
            'correo' => $correo,
            'rol' => $rol,
        );
        
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->habilitarUser($deshabilitarUser)){
            echo 'Usuario habilitado';
        }else{
            echo 'error';
        }
    }

    //ELIMINAR A UN USUARIO
    if(isset($_POST['eliminar'])){
        //SEPARAR STRINGS POR ESPACIOS  
        $nombreCompleto = explode(" ", $_POST['NombreUser']);

        //ALMACENAR LOS STRINGS SEPARADOS EN VARIABLES
        $nombre = $nombreCompleto[0];
        $apaterno = $nombreCompleto[1];
        $amaterno = $nombreCompleto[2];
        $correo = $_POST['usuarioCorreo'];
        $rol = $_POST['usuarioRol'];
        // almacenar en un array todos los valores ya limpios.
        $deshabilitarUser = array (
            'nombre' => $nombre,
            'apaterno' => $apaterno,
            'amaterno' => $amaterno,
            'correo' => $correo,
            'rol' => $rol,
        );
        
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->eliminarUser($deshabilitarUser)){
            echo 'Usuario eliminado';
        }else{
            echo 'error';
        }
    }

    //ACTUALIZAR A UN USUARIO
    if(isset($_POST['editar'])){
        //url de la pestaña admin update user
        $adminUpdateUser = 'admin-update-user.php';

        $userId = $_POST['idUser'];
        $nombreCompleto =  $_POST['NombreUser'];
        $correo = $_POST['usuarioCorreo'];
        $rol = $_POST['usuarioRol'];
        $sede = $_POST['usuarioSede'];

        header("location: $adminUpdateUser?id=$userId&nombre=$nombreCompleto&correo=$correo&rol=$rol&sede=$sede&estado=$estado");
        die();
    }
    
?>