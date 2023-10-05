<?php
    /* INSTANCIA PARA LA CLASE "SelectMaterials"*/
    $materials = new SelectMaterials();
    //Llamás al método sedes y guardar los datos en la variable "infoSedes"
    if (isset($_POST['searchInput'])) {
        $search = trim($_POST['Busqueda'],  ' \0\x0');
        $files = $_POST['Filas'];
        // Primero se hace la busqueda por nombre
        $infoMaterials = $materials->getMaterialSearch($search, $files);
    }else{
        $infoMaterials = $materials->getMaterialsAll();
    }
?>