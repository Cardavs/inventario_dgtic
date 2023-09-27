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
        //Validamos si ISBN es nulo para evitar errores.
        if(!empty($_POST['ISBN'])){
            $ISBNMaterial = trim($_POST['ISBN'], ' \t\n\r');
        }else{
            $ISBNMaterial = null;
        }
        //Validamos si Tiraje es nulo para evitar errores.
        if(!empty($_POST['Tiraje'])){
            $tirajeMaterial = trim($_POST['Tiraje'], ' \t\n\r');
        }else{
            $tirajeMaterial = null;
        }
        $autorMaterial = trim($_POST['Autor'], ' \t\n\r\0\x0');
        $versionMaterial = trim($_POST['Versión'], ' \t\n\r');
        $añoMaterial = trim($_POST['AñoEdicion'], ' \t\n\r\0\x0');
        $paginasMaterial = trim($_POST['NoPaginas'], ' \t\n\r\0\x0');
        $seccionMaterial = trim($_POST['seccion'], ' \t\n\r\0\x0');
        $areaMaterial = trim($_POST['area'], ' \t\n\r\0\x0');
        if (array_key_exists("material", $_FILES) && array_key_exists("indice", $_FILES)) {
            // Las claves existen en el array
            $archivoMaterial = $_FILES["material"];
            $indiceMaterial = $_FILES["indice"];
        } else {
            // Las claves no existen en el array
            // Mostrar un mensaje de error al usuario
            echo 'No se han subido los archivos fallido';
        }

        // almacenar en un array todos los valores ya limpios.
        $material = array(
            'nombre' => $nombreMaterial,
            'ISBN' => $ISBNMaterial,
            'tiraje' => $tirajeMaterial,
            'autor' => $autorMaterial,
            'version' => $versionMaterial,
            'año' => $añoMaterial,
            'paginas' => $paginasMaterial,
            'seccion' => $seccionMaterial,
            'area' => $areaMaterial,
            'material' => $archivoMaterial,
            'indice' => $indiceMaterial
        );

        //Instancia de la clase InsertSede para realizar el registro.
        $materialRegistro = new InsertMaterial();
        if($materialRegistro -> registrarMaterial($material)){
            echo '<script language="javascript">
                alert("El Registro ha sido completado correctamente");
                </script>';
        }else{
            echo '<script language="javascript">
                alert("El Registro no ha podido ser realizado");
                </script>';
        }
    }
?>