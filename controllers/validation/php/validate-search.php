<?php
//Instancia para la consulta de datos de usuario
$datosUser = new SelectUser();
// BUSQUEDA
if (isset($_POST['searchInput'])) {
    echo '<script language="javascript">
                alert("Entrando a busqueda");
                </script>';
    $search = trim($_POST['Busqueda'],  ' \0\x0');
    $files = $_POST['Filas'];

    // Primero se hace la busqueda por nombre
    $userInfo = $datosUser->getUserName($search, $files);
    // Si no hay registros en la busqueda por nombre realiza la busqueda por apellido paterno.
    if (empty($userInfo)) {
        $userInfo = $datosUser->getUserApaterno($search, $files);
    }

    // Si no hay registros en la busqueda por apellido paterno realiza la busqueda por apellido materno.
    if (empty($userInfo)) {
        $userInfo = $datosUser->getUserAmaterno($search, $files);
    }

    // Si no hay registros en la busqueda por apellido materno realiza la busqueda por correo.
    if (empty($userInfo)) {
        $userInfo = $datosUser->getUserCorreo($search, $files);
    }
}else{
    $userInfo = $datosUser->getDatosUser();
}

?>