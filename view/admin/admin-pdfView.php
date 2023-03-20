<?php

/**********************
 * pantalla: Ver pdf  *
 * date: 19/03/2023   *
 * autor: Roan        *
 **********************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarAdmin.php");?>
    
    <?php include(LAYOUT."/manage-material/pdfView.php");?>

    <?php include(LAYOUT."/footer.php");?>
</body>
</html>