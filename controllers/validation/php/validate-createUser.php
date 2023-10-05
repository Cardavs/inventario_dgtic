<?php
    include(BD_INSERT . 'insert-user.php');
    /*****************************************************
     * Archivo: Validar formulario para "Crear usuarios" *
     * Author: Roan                                      *
     * Date: 16/04/23                                    *
    ******************************************************/
    if(isset($_POST['CrearUsuario'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE    
        $nombre = trim($_POST['Nombre'],  ' \t\n\r\0\x0');
        $apaterno = trim($_POST['aPaterno'], ' \t\n\r\0\x0B');
        $amaterno = trim($_POST['aMaterno'], ' \t\n\r\0\x0B');
        $sede = $_POST['sede'];
        $rol = trim($_POST['rol'], ' \t\0\x0B');
        $correo = trim($_POST['correo'], ' \t\n\r\0\x0B');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $estado = TRUE;
        
       // almacenar en un array todos los valores ya limpios.
        $createUser = array (
            'nombre' => $nombre,
            'aPaterno' => $apaterno,
            'aMaterno' => $amaterno,
            'sede' => $sede,
            'rol' => $rol,
            'correo' => $correo,
            'password' => $password,
            'estado' => $estado
        );
            
        //Instancia de la clase InsertUser para realizar el registro.
        $insertUser = new InsertUser();
        if($insertUser->insertUser($createUser)){
            echo '<script language="javascript">
                alert("Usuario Registrado Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/create-user.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Crear al Usuario");
                window.location.href = "/inventario_dgtic/view/admin/create-user.php";
            </script>';
        }
    }

?>