<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertArea{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de area.
        * @param integer $datosArea arreglo que contiene los datos del area
        *               $datosArea[areaNombre], $datosArea[seccionArea], $datosArea[areaEstado]
        */
        public function registrarArea($datosArea)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO area (AreaNombre, Seccion_Id, AreaEstado) VALUES (:areaNombre, :seccionArea, :areaEstado)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":areaNombre", $datosArea['areaNombre']);
                $queryP->bindValue(":seccionArea", $datosArea['seccionArea']);
                $queryP->bindValue(":areaEstado", $datosArea['areaEstado']);

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