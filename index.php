<?php 
    /**********************
    * pantalla: logIn     *
    * date: 28/02/2023    *
    * autor: Roan         *
    ***********************/

    include_once($_SERVER['DOCUMENT_ROOT'].'/inventario_dgtic/dir.php');
    
    include(CONNECTION_BD);
    $conecction = new Conexion();
    $conecction->conectar();
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
        <a href="/inventario_dgtic/view/consultor/consultor-welcome.php">
            <button type="button" class="btn btn-primary btn-tabla">Vista Consultor</button>
        </a>
        <a href="/inventario_dgtic/view/editor/editor-welcome.php">
            <button type="button" class="btn btn-primary btn-tabla">Vista Editor</button>
        </a>
        <a href="/inventario_dgtic/view/CE/CE-welcome.php">
            <button type="button" class="btn btn-primary btn-tabla">Vista CE</button>
        </a>
    </div>

    <?php include(LAYOUT.'/footer.php'); ?>
</body>
</html>