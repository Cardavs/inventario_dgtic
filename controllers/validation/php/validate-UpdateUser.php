<?php
    /********************************************************
     * Archivo: realiza la configuracion para deshabilitrar *
     *          a un usuario                                *
     * Author: Roan                                         *
     * Date: 05/22/23                                       *  
     *******************************************************/

     //DESHABILITAR A UN USUARIO\
    if(isset($_POST['deshabilitar'])){
        //Recibiendo en ID del usuario a deshabilitar
        $id = $_POST['idUser'];
        
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->deshabilitarUser($id)){
            echo '<script language="javascript">
                alert("Usuario Deshabilitado");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al deshabilitar");
                </script>';
        }
    }

    //HABILITAR A UN USUARIO
    if(isset($_POST['habilitar'])){
        //Recibiendo el id del usuario que se va a habilitar
        $id = $_POST['idUser'];
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->habilitarUser($id)){
            echo '<script language="javascript">
                alert("Usuario habilitado");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al habilitar");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }
    }

    //ELIMINAR A UN USUARIO
    if(isset($_POST['eliminar'])){
        //Recibiendo el id del usuario que se va a eliminar
        $id = $_POST['idUser'];
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->eliminarUser($id)){
            echo '<script language="javascript">
                alert("Usuario eliminado");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al eliminar Usuario");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }
    }

    //ACTUALIZAR A UN USUARIO
    if(isset($_POST['editar'])){
        //url de la pestaña admin update user
        $adminUpdateUser = 'admin-update-user.php';

        $userId = $_POST['idUser'];
        //Redireccionando a la página con el id del usuario que se va a editar.
        header("location: $adminUpdateUser?id=$userId");
        die();
    }

    //Actualizar datos de usuario
    if (isset($_POST['actualizar'])) {
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
        if($UpdateUser -> actualizarUsuario($datosUser)){
            echo '<script language="javascript">
                alert("Datos Actualizados con exito");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
            die();
        }else{
            echo '<script language="javascript">
                alert("Error al acutalizar datos de Usuario");
                window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        }
    } elseif (isset($_POST['cancelar'])) {
        echo '<script language="javascript">
            window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        die();
    }

    if (isset($_POST['editarPass'])) {
         //url de la pestaña admin update user
         $adminUpdatePassword = 'admin-update-password.php';

         $userId = $_POST['idUser'];
         //Redireccionando a la página con el id del usuario que se va a editar.
         header("location: $adminUpdatePassword?id=$userId");
         die();
    }
    if (isset($_POST['EditPassword'])) {
        $idUser = $_POST['idUser'];
        $newPassword = $_POST['password'];
        $nombre = $_POST['Nombre'];
        $UpdateUser = new UpdateUser();
        if($UpdateUser->changePasswordbyiD($idUser, password_hash($newPassword, PASSWORD_DEFAULT))){
            $message = "Contraseña de ".$nombre." actualizada exitosamente";
        }else{
            $message = "Error en el cambio de Contraseña de ".$nombre;
        }
        echo '<script language="javascript">
        alert("'.$message.'");
            window.location.href = "/inventario_dgtic/view/admin/manage-account.php";
                </script>';
        die();

    }
