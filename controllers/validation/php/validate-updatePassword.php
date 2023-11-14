<?php
if (isset($_POST['EditPassword'])) {
    $idUser = $_SESSION['id'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $newPasswordConfirm = $_POST['newPasswordConfirm'];
    $SelectUser = new SelectUser();
    $access = $SelectUser->checkPassword($idUser);
    if (password_verify($oldPassword, $access['UsuarioPassword'])) {
        if($newPassword == $newPasswordConfirm){
            $UpdateUser = new UpdateUser();
            if($UpdateUser->changePasswordbyiD($idUser, password_hash($newPasswordConfirm, PASSWORD_DEFAULT))){
                echo '<script language="javascript">
                alert("Contraseña de actualizada exitosamente");
                window.location.href = "/inventario_dgtic/view/CE/CE-manage-password.php";
                </script>';
            }else{
                echo '<script language="javascript">
                alert("Error en el cambio de Contraseña");
                window.location.href = "/inventario_dgtic/view/CE/CE-manage-password.php";
                </script>';
            }
        }else{
            echo '<script language="javascript">
            alert("Las nuevas contraseñas no coinciden");
            window.location.href = "/inventario_dgtic/view/CE/CE-manage-password.php";
            </script>';
        }
    }else{
        echo '<script language="javascript">
        alert("La Contraseña Anterior no coincide con la contraseña antigua");
        window.location.href = "/inventario_dgtic/view/CE/CE-manage-password.php";
        </script>';
    }
}

?>