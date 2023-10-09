<?php 
    class SelectDownloads{
        
        public $connection;

        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /*
        * Realiza el select de las descargas registradas en la BD que estan habilitados
        */
        public function getDownloadsAll(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT * FROM descargas";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /*
        * Realiza el select de un grupo de descargas de acuerdo a una busqueda.
        */
        public function getDownloadsSearch($fehca_inicio, $fecha_fin, $sede){
            try {

                $connect = $this->connection->conectar();
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                if ($sede === "*") {
                    $query = "SELECT Material_Id, Sede_Id, COUNT(*) AS Descargas
                    FROM descargas
                    WHERE DescargaFecha BETWEEN :fehca_inicio AND :fecha_fin
                    GROUP BY Material_Id, Sede_Id;";
                    $queryP = $connect->prepare($query);
                } else {
                    $query = "SELECT Material_Id, COUNT(*) AS Descargas
                    FROM descargas
                    WHERE Sede_Id = :sede
                    AND DescargaFecha BETWEEN :fehca_inicio AND :fecha_fin
                    GROUP BY Material_Id;";
                    $queryP = $connect->prepare($query);
                    $queryP->bindValue(":sede", $sede);
                }
                
                $queryP->bindValue(":fehca_inicio", $fehca_inicio);
                $queryP->bindValue(":fecha_fin", $fecha_fin);
                $queryP->execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            if(sizeof($resultado) > 0){
                return $resultado;
            }elseif(sizeof($resultado) == 0){
                echo '<script language="javascript">
                        alert("No hay datos que coincidan con su busqueda");
                        window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                        </script>';
            }
        }
    }
?>