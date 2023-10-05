<?php
    //Instancia para la consulta de datos de usuario
    $datosUser = new SelectUser();
    // BUSQUEDA
    if (isset($_POST['searchInput'])) {
        $search = trim($_POST['Busqueda'],  ' \0\x0');
        $files = $_POST['Filas'];
        // Primero se hace la busqueda por nombre
        $userInfo = $datosUser->getUserSearch($search, $files);
    }else{
        $userInfo = $datosUser->getDatosUser();
    }
?>