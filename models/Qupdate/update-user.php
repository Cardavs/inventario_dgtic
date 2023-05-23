<?php
/*********************************
 * date: 05/22/2023              *
 * autor: Roan                   *
 *********************************/

    class UpdateUser{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE en la tabla de usuario.
        */
        public function deshabilitarUser($datosUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioEstado = 0 WHERE UsuarioNombre = :UsuarioNombre AND UsuarioApaterno = :UsuarioApaterno AND UsuarioAmaterno = :UsuarioAmaterno AND UsuarioCorreo=:UsuarioCorreo AND UsuarioRol =:UsuarioRol";

                $queryP = $connect -> prepare($query);

                $queryP->bindValue(":UsuarioNombre", $datosUser['nombre']);
                $queryP->bindValue(":UsuarioApaterno", $datosUser['apaterno']);
                $queryP->bindValue(":UsuarioAmaterno", $datosUser['amaterno']);
                $queryP->bindValue(":UsuarioCorreo", $datosUser['correo']);
                $queryP->bindValue(":UsuarioRol", $datosUser['rol']);
                
                $queryP -> execute();
                
                return $connect->commit();

            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>