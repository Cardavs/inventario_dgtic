<?php
/*********************************
 * date: 28/04/2023              *
 * autor: Roan                   *
 *********************************/

    include(CONNECTION_BD);

    class SelectUser{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el SELECT en la tabla de usuario.
        */
        public function getDatosUser(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, u.UsuarioEstado, s.sedeNombre FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id";
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