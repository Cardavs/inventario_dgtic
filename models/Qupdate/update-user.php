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
        * Realiza el UPDATE para deshabilitar un usuario en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene:
        *                $datosUser['nombre'], $datosUser['apaterno'], $datosUser['amaterno'],
        *               $datosUser['correo'], $datosUser['rol']
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

        /**
        * Realiza el UPDATE para habilitar a un usuario en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene:
        *                $datosUser['nombre'], $datosUser['apaterno'], $datosUser['amaterno'],
        *               $datosUser['correo'], $datosUser['rol']
        */
        public function habilitarUser($datosUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioEstado = 1 WHERE UsuarioNombre = :UsuarioNombre AND UsuarioApaterno = :UsuarioApaterno AND UsuarioAmaterno = :UsuarioAmaterno AND UsuarioCorreo=:UsuarioCorreo AND UsuarioRol =:UsuarioRol";
    
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

        /**
        * Realiza el UPDATE para eliminar a un usuario en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene:
        *                $datosUser['nombre'], $datosUser['apaterno'], $datosUser['amaterno'],
        *               $datosUser['correo'], $datosUser['rol']
        */
        public function eliminarUser($datosUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM usuario WHERE UsuarioNombre = :UsuarioNombre AND UsuarioApaterno = :UsuarioApaterno AND UsuarioAmaterno = :UsuarioAmaterno AND UsuarioCorreo=:UsuarioCorreo AND UsuarioRol =:UsuarioRol";
    
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
        /**
        * Realiza el UPDATE para actualizar1 a un usuario en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene:
        *                $datosUser['nombre'], $datosUser['apaterno'], $datosUser['amaterno'],
        *               $datosUser['correo'], $datosUser['rol']
        */
        public function actulazarDataUser($datosUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioNombre = :UsuarioNombre, UsuarioApaterno = :UsuarioApaterno, UsuarioAmaterno = :UsuarioAmaterno, UsuarioCorreo=:UsuarioCorreo, UsuarioRol =:UsuarioRol, Sede_Id = :UsuarioSede, UsuarioEstado = :UsuarioEstado WHERE Usuario_id = :Usuario_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":UsuarioNombre", $datosUser['nombre']);
                $queryP->bindValue(":UsuarioApaterno", $datosUser['apaterno']);
                $queryP->bindValue(":UsuarioAmaterno", $datosUser['amaterno']);
                $queryP->bindValue(":UsuarioCorreo", $datosUser['correo']);
                $queryP->bindValue(":UsuarioRol", $datosUser['rol']);
                $queryP->bindValue(":UsuarioSede", $datosUser['sede']);
                $queryP->bindValue(":UsuarioEstado", $datosUser['estado']);
                $queryP->bindValue(":Usuario_id", $datosUser['id']);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>