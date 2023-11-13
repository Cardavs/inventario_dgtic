<?php
// Inicia la sesión si aún no se ha iniciado
session_start();

// Cierra la sesión
session_destroy();

// Redirige al usuario al index o a donde desees
header("Location: /inventario_dgtic/index.php");
exit();
?>