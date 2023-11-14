<?php
$user = $_SESSION['rol'];
if ($user == 'administrador') {
    $user = "admin";
}

    //Se incluye el archivo con la clase para actualizar la diplomado
    include(BD_UPDATE . 'update-diplomado.php');

    //Se instancia la diplomado
    $diplomado = new UpdateDiplomado();

    //Si se selecciono el boton de habilitar la diplomado
    if(isset($_POST['habilitar'])){
        //se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para habilitar la diplomado
        if($diplomado -> habilitardiplomado($diplomadoId)){
            echo '<script language="javascript">
                alert("Diplomado Habilitado Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Habilitar Diplomado. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }
    }

    //Si se selecciona el boton de deshabilitar la diplomado
    if(isset($_POST['deshabilitar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para deshabilitar la diplomado
        if($diplomado -> deshabilitardiplomado($diplomadoId)){
            echo '<script language="javascript">
                alert("Diplomado Deshabilitado Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Deshabilitar Diplomado. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }
    }

    //Si se selecciona el boton de eliminar la diplomado
    if(isset($_POST['eliminar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para deshabilitar la diplomado
        if($diplomado -> eliminardiplomado($diplomadoId)){
            echo '<script language="javascript">
                alert("Diplomado Eliminado Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Eliminar Diplomado. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }
    }

    //Si se selecciona el boton de editar la diplomado
    if(isset($_POST['editar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //se redirecciona a la pantalla para editar la diplomado
        header('location: '.$user.'-edit-diplomado.php?id='.$diplomadoId);
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo GET
        $diplomadoId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newdiplomado = $_POST['diplomadoNombre'];
        $newEmision = $_POST['diplomadoEmision'];
        //Guardando todos los datos en un array
        $datosdiplomado = array(
            'id' => $diplomadoId,
            'nombre' => $newdiplomado,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($diplomado -> updatediplomado($datosdiplomado)){
            echo '<script language="javascript">
                alert("Diplomado Actualizado Correctamente");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }else{
            echo '<script language="javascript">
                alert("Error al Actualizar Diplomado. Consulte a un administrador");
                window.location.href = "/inventario_dgtic/view/'.$user.'/'.$user.'-manage-diplomado.php";
            </script>';
        }
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelar'])){
        header('location: '.$user.'-manage-diplomado.php');
    }
    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizarEditor'])){
        //recibiendo el id por el metodo GET
        $diplomadoId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newdiplomado = $_POST['diplomadoNombre'];
        $newEmision = $_POST['diplomadoEmision'];
        //Guardando todos los datos en un array
        $datosdiplomado = array(
            'id' => $diplomadoId,
            'nombre' => $newdiplomado,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($diplomado -> updatediplomado($datosdiplomado)){
            echo 'Actualizado';
            header('location: '.$user.'-manage-diplomados.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelarEditor'])){
        header('location: '.$user.'-manage-diplomados.php');
    }
?>