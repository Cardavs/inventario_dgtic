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
    /*if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo GET
        $areaId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newarea = $_POST['areaNombre'];
        $newEmision = $_POST['areaEmision'];
        //Guardando todos los datos en un array
        $datosarea = array(
            'id' => $areaId,
            'nombre' => $newarea,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($area -> updatearea($datosarea)){
            echo '<script language="javascript">
                alert("Area Actualizado Correctamente");
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
    //Dentro de la ventana para editar la area
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizarEditor'])){
        //recibiendo el id por el metodo GET
        $areaId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newarea = $_POST['areaNombre'];
        $newEmision = $_POST['areaEmision'];
        //Guardando todos los datos en un array
        $datosarea = array(
            'id' => $areaId,
            'nombre' => $newarea,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($area -> updatearea($datosarea)){
            echo 'Actualizado';
            header('location: '.$user.'-manage-areass.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la area
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelarEditor'])){
        header('location: '.$user.'-manage-areass.php');
    }*/
?>