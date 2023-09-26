<?php 
/*********************************
 * date: 06/05/2023              *
 * autor: Roan                   *
 *********************************/
    class SelectMaterials{
        
        public $connection;

        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /*
        * Realiza el select de los materiales registradas en la BD
        */
        public function getMaterials(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT * FROM material";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /*
        * Realiza el select de uno los materiales registradas en la BD por ID
        */
        public function getMaterialsById($materialId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT * FROM material WHERE Material_Id = :Material_id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Material_id", $materialId);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
    }
?>