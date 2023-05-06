<?php
/*********************************
 * date: 28/04/2023              *
 * autor: Roan                   *
 *********************************/

 include(CONNECTION_BD);

 class SelectSection{
    public $connection;

    public function __construct()
    {
        $this -> connection = new Conexion();
    }

    /*
    *   Traer los registros de secciones (SeccionNombre, TipoSeccion)
    */
    public function getSection()
    {
        try {
            $connect = $this -> connection -> conectar(); //Llamamos el método conectar
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "SELECT SeccionNombre, TipoSeccion, EstadoSeccion FROM secciones";
            $queryP = $connect -> prepare($query);
            $queryP -> execute();
            $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo 'Error: ' .$ex->getMessage() . die();
        }
        return $resultado;
    }
 }
?>