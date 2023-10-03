<?php
/*********************************
 * date: 10/03/2023              *
 * autor: Iván                   *
 *********************************/

    class UpdateMaterial{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para deshabilitar un material en la tabla de material.
        * @param integer $datosMaterial arreglo que contiene: el id del material para ser deshabilitado/habilitado.
        */
        public function toggleEstadoMaterial($idMaterial, $estado){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                if ($estado == 1) {
                    $query = "UPDATE material SET MaterialEstado = 0 WHERE Material_id = :Material_id";
                } else {
                    $query = "UPDATE material SET MaterialEstado = 1 WHERE Material_id = :Material_id";
                }
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Material_id", $idMaterial);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }