<?php
//Include del archivo con la clase Update sede
include(BD_UPDATE . 'update-sede.php');

//Instancia de la clase UpdateSede
$sede = new UpdateSede();

    //Si se presiona el boton de habilitar
    if(isset($_POST['habilitar'])){
        //Recibiendo el id de la sede que se va a modificar.
        $sedeId = $_POST['IdSede'];
        //Llamando al metodo habilitarSede de la clase UpdateSede.
        if($sede -> habilitarSede($sedeId)){
            echo '<script language="javascript">
                alert("Sede Habilitada Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Habilitar Sede, Consulte a un Administrador");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }

    }

    //Si se presiona el boton de deshabilitar.
    if(isset($_POST['deshabilitar'])){
        //Recibiendo el id de la sede que se va a modificar.
        $sedeId = $_POST['IdSede'];
        //Llamando al metodo deshabilitarSede de la clase UpdateSede.
        if($sede -> deshabilitarSede($sedeId)){
            echo '<script language="javascript">
                alert("Sede Deshabilitada Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Deshabilitar Sede, Consulte a un Administrador");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }
    }

    //Si se presiona el boton de eliminar.
    if(isset($_POST['eliminar'])){
        //Recibiendo el id de la sede que se va a modificar.
        $sedeId = $_POST['IdSede'];
        //LLamando al metodo eliminarSede de la clase UpdateSede.
        if($sede -> eliminarSede($sedeId)){
            echo '<script language="javascript">
                alert("Sede Eliminada Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Eliminar Sede. Consulte a un Administrador");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
        }
    }

    //Si se presiona el boton de editar.
    if(isset($_POST['editar'])){
        //Recibiendo el id de la sede que se va a modificar.
        $sedeId = $_POST['IdSede'];
        $adminUpdateSedes = 'admin-update-sedes.php';
        //LLamando al metodo eliminarSede de la clase UpdateSede.
        header("location: $adminUpdateSedes?id=$sedeId");
        die();
    }

    //Si se presiona el boton de editar.
    if(isset($_POST['actualizar'])){
        //Recibiendo el id de la sede que se va a modificar.
        $sedeId = $_POST['IdSede'];

        $newName = $_POST['NombreSede'];
        $newSiglas = $_POST['SedeSiglas'];

        //Almacenando los datos en un arreglo
        $datosSede = array(
            'idSede' => $sedeId,
            'nombre' => $newName,
            'siglas' => $newSiglas,
        );
        //LLamando al metodo actualizarSede de la clase UpdateSede.
        if($sede -> actualizarSede($datosSede)){
            echo '<script language="javascript">
                alert("Datos Actualizados Correctamente");
                window.location.href = "/inventario_dgtic/view/admin/admin-sedes.php";
            </script>';
            die();
        }
        
    }
    
    if(isset($_POST['cancelar'])){
        header('location: admin-sedes.php');
    }

?>