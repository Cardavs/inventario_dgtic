<?php 
    /******************************************************
     * Archivo: Validar formulario para "Crear secciones" *
     * Author: Roan                                       *
     * Date: 06/05/23                                     *
    *******************************************************/
    include(BD_INSERT . 'insert-diplomado.php');
    if(isset($_POST['addDiplomado'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE   
        $diplomadoName = trim($_POST['diplomadoName'], ' \t\n\r\0\x0');
        $diplomadoEmision = trim($_POST['diplomadoEmision'], ' \t\r\0\x0');
        $diplomadoEstado= trim($_POST['diplomadoEstado'], ' \t\n\r\0\x0');

        // almacenar en un array todos los valores ya limpios.
        $diplomado = array(
            'diplomadoNombre' => $diplomadoName,
            'diplomadoEmision' => $diplomadoEmision,
            'diplomadoEstado' => $diplomadoEstado
        );

        //Instancia de la clase InsertSede para realizar el registro.
        $diplomadoRegistro = new InsertDiplomado();
        if($diplomadoRegistro -> registrarDiplomado($diplomado)){
            echo '<script language="javascript">
                alert("Diplomado Registrado Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-manage-diplomado.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Registrado Diplomado. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/admin/admin-manage-diplomado.php";
            </script>';
        }
    }
?>