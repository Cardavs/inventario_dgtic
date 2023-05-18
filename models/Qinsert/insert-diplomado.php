<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertDiplomado{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de usuario.
        * @param integer $datosDiplomado arreglo que contiene los datos del diplomado a insertar
        *               $datosDiplomado[diplomadoNombre], $diplomadoEmision[diplomadoEmision], $diplomadoEstado[diplomadoEstado]
        */
        public function registrarDiplomado($datosDiplomado)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO diplomado (DiplomadoNombre, DiplomadoEmision, DiplomadoEstado) VALUES (:DiplomadoNombre, :DiplomadoEmision, :DiplomadoEstado)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":DiplomadoNombre", $datosDiplomado['diplomadoNombre']);
                $queryP->bindValue(":DiplomadoEmision", $datosDiplomado['diplomadoEmision']);
                $queryP->bindValue(":DiplomadoEstado", $datosDiplomado['diplomadoEstado']);

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