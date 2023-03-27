<?php

/*******************************
 * pantalla: Buscar descargas  *
 * date: 22/03/2023            *
 * autor: Roan                 *
 *******************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarEditor.php");?>

    <?php include(LAYOUT."/templates/manage-downloads.php"); ?>
    
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>