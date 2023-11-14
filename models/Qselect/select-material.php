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
                //$connect->beginTransaction();
                
                $query = "SELECT Material_Id, MaterialNombre, MaterialEstado, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, MaterialEdicion, MaterialPaginas, MaterialPDF, MaterialIndice, secciones.SeccionNombre, area.AreaNombre FROM material JOIN area ON material.Area_Id=area.Area_Id JOIN secciones ON area.Seccion_Id=secciones.Seccion_Id WHERE MaterialEstado = True;";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /* 
        Realiza un select de todos los materiales registrados en la BD 
        */
        public function getMaterialsAll(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$connect->beginTransaction();
                
                $query = "SELECT Material_Id, MaterialNombre, MaterialEstado, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, MaterialEdicion, MaterialPaginas, MaterialPDF, MaterialIndice, secciones.SeccionNombre, area.AreaNombre, area.Seccion_Id FROM material JOIN area ON material.Area_Id=area.Area_Id JOIN secciones ON area.Seccion_Id=secciones.Seccion_Id";
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
                //$connect->beginTransaction();
                
                $query = "SELECT Material_Id, MaterialNombre, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, MaterialEdicion, MaterialPaginas, MaterialPDF, MaterialIndice, area.Area_Id, area.Seccion_Id, area.AreaNombre FROM material JOIN area ON material.Area_Id = area.Area_Id WHERE Material_Id = :Material_id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Material_id", $materialId);
                $queryP -> execute();
                $resultado = $queryP->fetch(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage();
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
                //$connect->beginTransaction();
                
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
        /**
         * Realiza Select que arroja la ruta de los archivos material e indice con el Id de Material
         */
        public function getPathsMaterial($materialId){
            try{
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$connect->beginTransaction();
                
                $query = "SELECT MaterialPDF, MaterialIndice FROM material WHERE Material_Id = :Material_id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Material_id", $materialId);
                $queryP -> execute();
                $resultado = $queryP->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
    }
?>