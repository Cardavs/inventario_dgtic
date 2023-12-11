<?php
$user = $_SESSION['rol'];
if ($user == 'administrador') {
    $user = "admin";
}

    //Se incluye el archivo con la clase para actualizar la area
    include(BD_UPDATE . 'update-area.php');

    //Se instancia la area
    $area = new UpdateArea();

 //CAMBIAR ESTADO DE UN Area\
if (isset($_POST['cambio'])) {

    //Recibiendo en ID del area a actualizar
    $id = $_POST['areaId'];
    $estado = $_POST['estadoArea'];

    //Instancia de la clase UpdateArea para realizar el registro.
    $UpdateArea = new UpdateArea();
    if ($UpdateArea->toggleEstadoArea($id, $estado)) {
        if ($estado) {
            $message = "Area Deshabilitadoa";
        } else {
            $message = "Area habilitada";
        }
    } else {
        $message = "Error al cambiar estado";
    }
    $_SESSION['message'] = $message;
    header("Location: /inventario_dgtic/view/$user/$user-manage-areas.php");
    exit;
}

    //Si se selecciona el boton de eliminar la area
    if(isset($_POST['eliminar'])){
        //Se recibe el id de la area seleccionada
        $areaId = $_POST['areaId'];
        //Se llama al metodo para deshabilitar la area
        if($area -> eliminarArea($areaId)){
            echo '<script language="javascript">
                alert("Area Eliminada Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Eliminar Area. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
        }
    }

    //Si se selecciona el boton de editar la area
    if(isset($_POST['editar'])){
        //Se recibe el id de la area seleccionada
        $areaId = $_POST['areaId'];
        //se redirecciona a la pantalla para editar la area
        header('location: '.$user.'-edit-area.php?id='.$areaId);
    }

    //Dentro de la ventana para editar la area
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo POST
        $areaId = $_POST['idArea'];
        //recibiendo los campos que se actualizaran
        $newarea = $_POST['areaNombre'];
        $newSeccion = $_POST['areaSeccion'];
        //Guardando todos los datos en un array
        $datosarea = array(
            'id' => $areaId,
            'nombre' => $newarea,
            'idSeccion' => $newSeccion
        );

        //llamando al metodo para actualizar informacion
        if($area -> updateArea($datosarea)){
            echo '<script language="javascript">
                alert("Area Actualizada Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Actualizar Area. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-areas.php";
            </script>';
        }
    }

    //Dentro de la ventana para editar la area
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelar'])){
        header('location: '.$user.'-manage-areas.php');
    }
?>