<?php 
    /**************************************************
     *                                                   * 
     * Archivo: Validar formulario para "Crear Material" *   
     *                                                   *
    ***************************************************/
    include(BD_INSERT . 'insert-material.php');
    
    if(isset($_POST['guardarMaterial'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE   
        $nombreMaterial = trim($_POST['NombreMaterial'], ' \t\n\r\0\x0');
        $tipoMaterial = trim($_POST['tipo'], ' \t\n\r\0\x0');
        $ISBNMaterial = trim($_POST['ISBN'], ' \t\n\r');
        $tirajeMaterial = trim($_POST['Tiraje'], ' \t\n\r\0\x0');
        $autorMaterial = trim($_POST['Autor'], ' \t\n\r\0\x0');
        $versionMaterial = trim($_POST['Versión'], ' \t\n\r');
        $añoMaterial = trim($_POST['AñoEdicion'], ' \t\n\r\0\x0');
        $paginasMaterial = trim($_POST['NoPaginas'], ' \t\n\r\0\x0');
        $seccionMaterial = trim($_POST['seccion'], ' \t\n\r\0\x0');
        $areaMaterial = trim($_POST['area'], ' \t\n\r\0\x0');
        $archivoMaterial = $_FILES["material"];
        $indiceMaterial = $_FILES["indice"];

        // almacenar en un array todos los valores ya limpios.
        $material = array(
            'nombre' => $nombreMaterial,
            'tipo' => $tipoMaterial,
            'ISBN' => $ISBNMaterial,
            'tiraje' => $tirajeMaterial,
            'autor' => $autorMaterial,
            'version' => $versionMaterial,
            'año' => $añoMaterial,
            'paginas' => $paginasMaterial,
            'seccion' => $seccionMaterial,
            'area' => $areaMaterial,
            'material' => $Material,
            'indice' => $indiceMaterial
        );

        //Instancia de la clase InsertSede para realizar el registro.
        $materialRegistro = new InsertMaterial();
        if($materialRegistro -> registrarMaterial($material)){
            echo 'Registro realizado';
        }else{
            echo 'Registro fallido';
        }
    }
?>