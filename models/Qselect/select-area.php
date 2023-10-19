<?php 
/*********************************
 * date: 10/18/2023              *
 * autor: Ivan                   *
 *********************************/
    class SelectAreas{
        
        public $connection;

        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /*
        * Realiza el select de las areas registradas en la BD que estan habilitadas
        */
        public function getAreas(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $query = "SELECT Area_Id, AreaNombre, Seccion_Id FROM area WHERE AreaEstado = True";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /* 
        Realiza un select de todos los areaes registrados en la BD 
        */
        public function getAreasAll(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $query = "SELECT Area_Id, AreaNombre FROM area";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /*
        * Realiza el select de un areas registrada en la BD por ID
        */
        public function getAreaById($areaId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $query = "SELECT AreaNombre, secciones.SeccionNombre FROM area JOIN secciones ON secciones.Seccion_Id = area.Seccion_Id WHERE Area_Id = :Area_id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Area_id", $areaId);
                $queryP -> execute();
                $resultado = $queryP->fetch(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /*
        * Realiza la busqueda de una los areas registradas en la BD por ID
        */
        public function getAreaSearch($busqueda, $filas){
            try {

                // Convertir $filas a un número entero
                $limit = intval($filas);

                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $query = "SELECT * FROM area WHERE AreaNombre LIKE :busqueda LIMIT $limit";
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
                        window.location.href = "/inventario_dgtic/view/admin/manage-area.php";
                        </script>';
            }
        }
    }
?>