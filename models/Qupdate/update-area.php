<?php
/*********************************
 * date: 07/12/2023              *AreaEstado
 * autor: Ivan                   *
 *********************************/

    class UpdateArea{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para habilitar una area en la tabla de area.
        * @param integer $areaId contiene el id de la area que va a ser actualizada
        *                $estado contiene el estado actual del registro
        */
        public function toggleEstadoArea($areaId, $estado){
            try {
                $connect = $this->connection -> conectar();
                if ($estado ==1) {
                    $estado =0;
                }else{
                    $estado =1;
                }
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE area SET AreaEstado = :estado WHERE Area_Id = :Area_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Area_Id", $areaId);
                $queryP->bindValue(":estado", $estado);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para eliminar una area en la tabla de area.
        * @param integer $areaId contiene el id de la area que va a ser eliminada
        */
        public function eliminarArea($areaId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM area WHERE Area_Id = :Area_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Area_Id", $areaId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para EDITAR una area en la tabla de area.
        * @param integer $datosArea contiene los datos para actulizar una area.
        *                   ['id'], ['nombre'], ['idSeccion']
        */
        public function updateArea($datosArea){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE area SET AreaNombre = :AreaNombre, Seccion_Id = :Seccion_Id WHERE Area_Id = :Area_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Area_Id", $datosArea['nombre']);
                $queryP->bindValue(":Seccion_Id", $datosArea['idSeccion']);
                $queryP->bindValue(":AreaNombre", $datosArea['id']);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>