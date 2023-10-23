<?php
    //Instancia para la consulta de datos de usuario
    $downloads = new SelectDownloads();
    // Crea una instancia de la clase SelectDownloadsGraphic
    $downloadsGraphic = new SelectDownloadsGraphic();
    // BUSQUEDA
    if (isset($_POST['searchInput'])) {
        if($_POST['tipo']=='Descargas'){
            $fehca_inicio = $_POST['fechainicio'];
            $fehca_fin = $_POST['fechafin'];
            $sede = $_POST['sedeDescarga'];
            if (empty($fehca_inicio) || empty($fehca_fin) || empty($sede)) {
                // No se cumplen los requisitos
                echo '<script language="javascript">
                        alert("Por favor complete los campos para generar la grafica");
                        window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                        </script>';
            }
            $infoDownloads = $downloads->getDownloadsSearch($fehca_inicio, $fehca_fin, $sede);
            $NombreMaterial = $infoDownloads['NombreMaterial'];
            $descargas = $infoDownloads['descargas'];
            $SedeNombre = $infoDownloads['SedeNombre'];
            $Consulta = 'Descargas por material realizadas en la Sede: ';
        }else{
            $fehca_inicio = $_POST['fechainicio'];
            $fehca_fin = $_POST['fechafin'];
            $sede = $_POST['sedeDescarga'];
            if (empty($fehca_inicio) || empty($fehca_fin) || empty($sede)) {
                // No se cumplen los requisitos
                echo '<script language="javascript">
                        alert("Por favor complete los campos para generar la grafica");
                        window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                        </script>';
            }
            $infoDownloads = $downloads->getDownloadsSearchCopies($fehca_inicio, $fehca_fin, $sede);
            $NombreMaterial = $infoDownloads['NombreMaterial'];
            $descargas = $infoDownloads['descargas'];
            $SedeNombre = $infoDownloads['SedeNombre'];
            $Consulta = 'Copias generadas por material en la Sede: ';
        }
    }else if(isset($_POST['downloadInputFilter'])){
        $fehca_inicio = $_POST['fechainicio'];
        $fehca_fin = $_POST['fechafin'];
        $sede = $_POST['sedeDescarga'];
        if (empty($fehca_inicio) || empty($fehca_fin) || empty($sede)) {
            // Llama a la función getAllReport() para generar el archivo y realizar la descarga
            $nombreArchivo = $downloadsGraphic->getAllReport();
            // Completar tabla con valores por default
            $infoDownloads = $downloads->getDownloadsSearch('2023-01-01', '2023-03-01', '1');
            $NombreMaterial = $infoDownloads['NombreMaterial'];
            $descargas = $infoDownloads['descargas'];
            $SedeNombre = $infoDownloads['SedeNombre'];
            $Consulta = 'Descargas por material realizadas en la Sede: ';
        }else if($_POST['tipo']=='Descargas'){
            // Descargamos el Excel con los datos de la grafica:
            $infoReport = $downloadsGraphic->getDownloadsReport($fehca_inicio, $fehca_fin, $sede);
            $NombreMaterial = $infoReport['NombreMaterial'];
            $descargas = $infoReport['descargas'];
            $SedeNombre = $infoReport['SedeNombre'];
            $Consulta = 'Descargas por material realizadas en la Sede: ';
            $nombreArchivo = $infoReport['downloadLink'];
        }else{
            // Descargamos el Excel con los datos de la grafica:
            $infoReport = $downloadsGraphic->getCopiesReport($fehca_inicio, $fehca_fin, $sede);
            $NombreMaterial = $infoReport['NombreMaterial'];
            $descargas = $infoReport['descargas'];
            $SedeNombre = $infoReport['SedeNombre'];
            $Consulta = 'Copias generadas por material en la Sede: ';
            $nombreArchivo = $infoReport['downloadLink'];
        }
    }else{
        // Completar tabla con valores por default
        $infoDownloads = $downloads->getDownloadsSearch('2023-01-01', '2023-03-01', '1');
        $NombreMaterial = $infoDownloads['NombreMaterial'];
        $descargas = $infoDownloads['descargas'];
        $SedeNombre = $infoDownloads['SedeNombre'];
        $Consulta = 'Descargas por material realizadas en la Sede: ';
    }
?>