<?php
    /*****************************************************
     * Archivo: Validar formulario para "Crear usuarios" *
     * Author: Roan                                      *
     * Date: 16/04/23                                    *
    ******************************************************/
    
    //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
    //DESPUÉS SE ALMACENA EN UNA VARIABLE    
    $nombre = trim($_POST['Nombre'],  ' \t\n\r\0\x0B');
    $apaterno = trim($_POST['aPaterno'], ' \t\n\r\0\x0B');
    $amaterno = trim($_POST['aMaterno'], ' \t\n\r\0\x0B');
    $sede = trim($_POST['sede'], ' \t\n\r\0\x0B');
    $rol = trim($_POST['rol'], ' \t\n\r\0\x0B');
    $correo = trim($_POST['correo'], ' \t\n\r\0\x0B');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    //almacenar en un array todos los valores ya limpios.
    $createUser = array (
        "DatosUser" => array(
            'nombre' => $nombre,
            'aPaterno' => $apaterno,
            'aMaterno' => $amaterno,
            'sede' => $sede,
            'rol' => $rol,
            'correo' => $correo,
            'password' => $password
            )
        );
        
    echo '<pre>';
    print_r($createUser);
    echo '</pre>';
    echo '<br>';

    echo($createUser['DatosUser']['nombre']);
    echo($createUser['DatosUser']['aPaterno']);
?>