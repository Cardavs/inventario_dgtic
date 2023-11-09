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
        * @param integer $datosUser arreglo que contiene: el id del usuario para ser deshabilitado.
        */
        public function deshabilitarUser($idUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioEstado = 0 WHERE Usuario_id = :Usuario_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Usuario_id", $idUser);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }

        /**
        * Realiza el UPDATE para habilitar a un usuario en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene:el id del usuario que se va a habilitar
        */
        public function habilitarUser($idUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioEstado = 1 WHERE Usuario_id = :Usuario_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Usuario_id", $idUser);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para actualizar1 a un usuario en la tabla de usuario.
        * @param integer $datosUsuario arreglo que contiene:
        *                $datosUsuario['id'], $datosUsuario['nombre'], $datosUsuario['apaterno'], $datosUsuario['amaterno'],
        *               $datosUsuario['correo'], $datosUsuario['rol']
        */
        public function actualizarUsuario($datosUsuario){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET Sede_Id = :Sede_Id, UsuarioNombre = :UsuarioNombre, UsuarioApaterno = :UsuarioApaterno, UsuarioAMaterno = :UsuarioAMaterno, UsuarioCorreo = :UsuarioCorreo, UsuarioRol = :UsuarioRol  WHERE Usuario_Id = :Usuario_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Usuario_Id", $datosUsuario['UserId']);
                $queryP->bindValue(":Sede_Id", $datosUsuario['SedeUser']);
                $queryP->bindValue(":UsuarioNombre", $datosUsuario['NombreUser']);
                $queryP->bindValue(":UsuarioApaterno", $datosUsuario['ApaternoUser']);
                $queryP->bindValue(":UsuarioAMaterno", $datosUsuario['AmaternoUser']);
                $queryP->bindValue(":UsuarioCorreo", $datosUsuario['CorreoUser']);
                $queryP->bindValue(":UsuarioRol", $datosUsuario['RolUser']);
                
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
        public function eliminarUser($idUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM usuario WHERE Usuario_id = :Usuario_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Usuario_id", $idUser);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }

        /**
         * Realiza un update a la contraseña del usuario por medio de su ID
         * 
         * @param integer $idUser id del Usuario a modificar
         * @param string $password Contraseña ya cifrada
         * 
         * @return boolean True si se realizo el UPDATE
         *                 False si se falló el UPDATE
         */ 
        public function changePasswordbyiD($idUser, $password){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE usuario SET UsuarioPassword = :UsuarioPassword WHERE Usuario_id = :Usuario_id";
    
                $queryP = $connect -> prepare($query);
                
                $queryP->bindValue(":UsuarioPassword", $password);
                $queryP->bindValue(":Usuario_id", $idUser);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>