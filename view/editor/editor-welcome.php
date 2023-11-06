<?php 
    /*******************************
    * pantalla: welcome Editor     *
    * date: 24/03/2023             *
    * autor: Roan                  *
    ********************************/

    include_once($_SERVER['DOCUMENT_ROOT'].'/inventario_dgtic/dir.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <?php include(LAYOUT.'/head.php');?>
<body>
    <?php include(LAYOUT.'/header.php');?>
    <?php include(LAYOUT."/navbar-users/navbarEditor.php");?>

    <div class="container caja_welcome">
        <h1 class="container col-sm-12 col-md-4">Bienvenid@ <?php echo $_SESSION['nombre']?></h1>
    </div>

    <?php include(LAYOUT.'/footer.php'); ?>
</body>
</html>