<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertSection{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de usuario.
        * @param integer $datosSeccion arreglo que contiene los datos de la sede
        *               $datosSeccion[nombreSeccion], $datosSeccion[tipoSection], $datosSeccion[estado]
        */
        public function registrarSeccion($datosSeccion)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO secciones (SeccionNombre , EstadoSeccion) VALUES (:SeccionNombre, :EstadoSeccion)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":SeccionNombre", $datosSeccion['nombreSeccion']);
                $queryP->bindValue(":EstadoSeccion", $datosSeccion['estadoSeccion']);

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