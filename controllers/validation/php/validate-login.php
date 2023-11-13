<?php

/****************************
 * pantalla: validar login   *
 * date: 29/11/2023          *
 * autor: Iván               *
 *****************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);
require_once(BD_SELECT . 'select-users.php');
session_start();


if (isset($_POST['login'])) {
    $email = $_POST['correo'];
    $passw = $_POST['password'];
    $SelectUser = new SelectUser();
    $access = $SelectUser->getUserAccess($email);
    if ($access === false) {
        echo '<script language="javascript">
        alert("Usuario o Contraseña no Válidos");
        </script>';
    }
    
    //password_verify($passw, $access['UsuarioPassword'])
    if (password_verify($passw, $access['UsuarioPassword']) && $access['UsuarioEstado']) {
        $_SESSION['id'] = $access['Usuario_Id'];
        $_SESSION['nombre'] = $access['UsuarioNombre'];
        $_SESSION['rol'] = $access['UsuarioRol'];
        $_SESSION['sede'] = $access['Sede_Id'];
        $_SESSION['sedenombre'] = $access['SedeNombre'];
        
        if($access['UsuarioRol'] == "administrador"){
            header("Location: /inventario_dgtic/view/admin/admin_welcome.php");
        }elseif($access['UsuarioRol'] == "CE"){
            header("Location: /inventario_dgtic/view/CE/CE-welcome.php");
        }elseif($access['UsuarioRol'] == "Consultor"){
            header("Location: /inventario_dgtic/view/consultor/consultor-welcome.php");
        }else{
            header("Location: /inventario_dgtic/view/editor/editor-welcome.php");
        }
    }else{
        echo '<script language="javascript">
        alert("Usuario o Contraseña no Válidos");
        </script>';
    }
}
