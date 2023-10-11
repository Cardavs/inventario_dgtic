<?php
    //Instancia para la consulta de datos de usuario
    $downloads = new SelectDownloads();
    // BUSQUEDA
    if (isset($_POST['searchInput'])) {
        $fehca_inicio = $_POST['fechainicio'];
        $fehca_fin = $_POST['fechafin'];
        $sede = $_POST['sedeDescarga'];
        // Primero se hace la busqueda por nombre
        $infoDownloads = $downloads->getDownloadsSearch($fehca_inicio, $fehca_fin, $sede);
    }else{
        $infoDownloads = $downloads->getDownloadsSearch('2023-01-01', '2023-03-01', '1');
        $materialIds = $infoDownloads['materialIds'];
        $descargas = $infoDownloads['descargas'];
    }
?>