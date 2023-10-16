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
        public function getDownloadsSearch($fecha_inicio, $fecha_fin, $sede){
            try {
                $connect = $this->connection->conectar();
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                    $query = "SELECT m.MaterialNombre AS NombreMaterial, s.SedeNombre AS SedeNombre, COUNT(*) AS Descargas
                    FROM descargas d
                    INNER JOIN material m ON d.Material_Id = m.Material_Id
                    INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
                    WHERE d.Sede_Id = :Sede_Id
                    AND d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin
                    GROUP BY m.MaterialNombre;";
                    $queryP = $connect->prepare($query);
                   
                $queryP->bindValue(":Sede_Id", $sede);
                $queryP->bindValue(":fecha_inicio", $fecha_inicio);
                $queryP->bindValue(":fecha_fin", $fecha_fin);
                $queryP->execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Hola';
                echo 'Error: ' .$ex->getMessage();
            }
            if(count($resultado) > 0){
                $NombreMaterial = [];
                $descargas = [];
                $SedeNombre = [];

                foreach ($resultado as $data) {
                $NombreMaterial[] = $data['NombreMaterial'];
                $descargas[] = $data['Descargas'];
                $SedeNombre = $data['SedeNombre'];
                }

                return ['NombreMaterial' => $NombreMaterial, 'descargas' => $descargas, 'SedeNombre' => $SedeNombre];
            }elseif(sizeof($resultado) == 0){
                echo '<script language="javascript">
                        alert("No hay datos que coincidan con su busqueda");
                        window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                        </script>';
            }
        }

        public function getDownloadsSearchCopies($fecha_inicio, $fecha_fin, $sede){
            try {
                $connect = $this->connection->conectar();
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                    $query = "SELECT m.MaterialNombre AS NombreMaterial, s.SedeNombre AS SedeNombre, SUM(d.DescargaCantidad) AS Descargas
                    FROM descargas d
                    INNER JOIN material m ON d.Material_Id = m.Material_Id
                    INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
                    WHERE d.Sede_Id = :Sede_Id
                    AND d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin
                    GROUP BY m.MaterialNombre;";
                    $queryP = $connect->prepare($query);
                   
                $queryP->bindValue(":Sede_Id", $sede);
                $queryP->bindValue(":fecha_inicio", $fecha_inicio);
                $queryP->bindValue(":fecha_fin", $fecha_fin);
                $queryP->execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Hola';
                echo 'Error: ' .$ex->getMessage();
            }
            if(count($resultado) > 0){
                $NombreMaterial = [];
                $descargas = [];
                $SedeNombre = [];

                foreach ($resultado as $data) {
                $NombreMaterial[] = $data['NombreMaterial'];
                $descargas[] = $data['Descargas'];
                $SedeNombre = $data['SedeNombre'];
                }

                return ['NombreMaterial' => $NombreMaterial, 'descargas' => $descargas, 'SedeNombre' => $SedeNombre];
            }elseif(sizeof($resultado) == 0){
                echo '<script language="javascript">
                        alert("No hay datos que coincidan con su busqueda");
                        window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                        </script>';
            }
        }
    }
?>