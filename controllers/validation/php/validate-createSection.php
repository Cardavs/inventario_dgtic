<?php 
    /******************************************************
     * Archivo: Validar formulario para "Crear secciones" *
     * Author: Roan                                       *
     * Date: 06/05/23                                     *
    *******************************************************/
    include(BD_INSERT . 'insert-section.php');
    if(isset($_POST['addSeccion'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE   
        $seccionName = trim($_POST['sectionInput'], ' \t\n\r\0\x0');
        $estadoSeccion= trim($_POST['estado'], ' \t\n\r\0\x0');

        // almacenar en un array todos los valores ya limpios.
        $seccion = array(
            'nombreSeccion' => $seccionName,
            'estadoSeccion' => $estadoSeccion
        );

        //Instancia de la clase InsertSede para realizar el registro.
        $seccionRegistro = new InsertSection();
        if($seccionRegistro -> registrarSeccion($seccion)){
            echo '<script language="javascript">
                alert("Registro Realizado Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-manage-section.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Registro Fallido. Consulte a un Administrador");
                window.location.href = "/inventario_dgtic/view/admin/admin-manage-section.php";
            </script>';
        }
    }
?>