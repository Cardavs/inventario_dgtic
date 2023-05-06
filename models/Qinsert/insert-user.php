<?php
    //Se importa el archivo para conectarse a la bd
    include(CONNECTION_BD);
    
    class InsertUser{
        //Conexion
        private $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de usuario.
        * @param integer $datosUser arreglo que contiene los datos del usuario
        *               $datosUser[nombre], $datosUser[aPaterno], $datosUser[aMaterno], $datosUser[sede], 
        *               $datosUser[rol], $datosUser[correo], $datosUser[password].
        */
        public function insertUser($datosUser)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO usuario (Sede_Id, UsuarioNombre, UsuarioApaterno, UsuarioAmaterno, UsuarioCorreo, UsuarioPassword, UsuarioEstado, UsuarioRol) VALUES (:Sede_Id, :UsuarioNombre, :UsuarioApaterno, :UsuarioAmaterno, :UsuarioCorreo, :UsuarioPassword, :UsuarioEstado, :UsuarioRol)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":Sede_Id", $datosUser['sede']);
                $queryP->bindValue(":UsuarioNombre", $datosUser['nombre']);
                $queryP->bindValue(":UsuarioApaterno", $datosUser['aPaterno']);
                $queryP->bindValue(":UsuarioAmaterno", $datosUser['aMaterno']);
                $queryP->bindValue(":UsuarioCorreo", $datosUser['correo']);
                $queryP->bindValue(":UsuarioPassword", $datosUser['password']);
                $queryP->bindValue(":UsuarioEstado", $datosUser['estado']);
                $queryP->bindValue(":UsuarioRol", $datosUser['rol']);

                $queryP->execute();
                $connect->commit();

                return TRUE;

            } catch (PDOException $ex) {
                print "Error:" . $ex->getMessage() . die();
                $connect->rollback();
                return FALSE;
            }
        }

    }


?>