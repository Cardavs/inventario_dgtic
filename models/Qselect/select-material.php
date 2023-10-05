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
        * Realiza el select de los materiales registradas en la BD que estan habilitados
        */
        public function getMaterials(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT * FROM material WHERE MaterialEstado = True";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        public function getMaterialsAll(){
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
        public function getMaterialById($materialId){
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
        /*
        * Realiza el select de uno los materiales registradas en la BD por ID
        */
        public function getMaterialSearch($busqueda, $filas){
            try {

                // Convertir $filas a un número entero
                $limit = intval($filas);

                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT * FROM material WHERE MaterialNombre LIKE :busqueda LIMIT $limit";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":busqueda", '%'. $busqueda .'%');
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            if(sizeof($resultado) > 0){
                return $resultado;
            }elseif(sizeof($resultado) == 0){
                echo '<script language="javascript">
                        alert("No hay datos que coincidan con su busqueda");
                        window.location.href = "/inventario_dgtic/view/admin/manage-material.php";
                        </script>';
            }
        }
    }
?>