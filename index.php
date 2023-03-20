<?php 
    /**********************
    * pantalla: logIn     *
    * date: 28/02/2023    *
    * autor: Roan         *
    ***********************/

    include_once($_SERVER['DOCUMENT_ROOT'].'/inventario_dgtic/dir.php');
?>

<!DOCTYPE html>
<html lang="es">
    <?php include(LAYOUT.'/head.php');?>
<body>
    <?php include(LAYOUT.'/header.php');?>

    <div class="container caja_welcome">
        <a href="/inventario_dgtic/view/admin/admin_welcome.php">
            <button type="button" class="btn btn-primary btn-tabla">Vista Admin</button>
        </a>
        <a href="">
            <button type="button" class="btn btn-primary btn-tabla">Vista Consultor</button>
        </a>
        <a href="">
            <button type="button" class="btn btn-primary btn-tabla">Vista Esitor</button>
        </a>
        <a href="">
            <button type="button" class="btn btn-primary btn-tabla">Vista CE</button>
        </a>
    </div>

    <?php include(LAYOUT.'/footer.php'); ?>
</body>
</html>