<?php
    include(BD_UPDATE . 'update-user.php');
    /********************************************************
     * Archivo: realiza la configuracion para deshabilitrar *
     *          a un usuario                                *
     * Author: Roan                                         *
     * Date: 05/22/23                                       *  
     *******************************************************/
    if(isset($_POST['deshabilitar'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE    
        $nombreCompleto = explode(" ", $_POST['NombreUser']);

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

?>