<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertMaterial{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de material.
        * @param integer $datosMaterial arreglo que contiene los datos del material
        *               $datosMaterial[MaterialNombre]
        */
        public function registrarMaterial($datosMaterial)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                // Obtener información del archivo subido
                $nombre_pdf = basename($datosMaterial['material']["name"]);
                $nombre_indice = basename($datosMaterial['indice']["name"]);

                //Ruta donde se va a guardar el archivo
                $rutaArchivoPDF = __DIR__ . "/../../material/pdf/" . $nombre_pdf;
                $rutaArchivoIndice = __DIR__ . "/../../material/indice/" . $nombre_indice;

                //Ruta de Archivo en BD.
                $rutaArchivobdPDF ="material/pdf/" . $nombre_pdf;
                $rutaArchivobdIndice ="material/indice/" . $nombre_indice;

                $query = 'INSERT INTO material (MaterialNombre, MaterialAuditoria, MaterialCompilacion, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, MaterialEdicion, MaterialPaginas, MaterialSeccion, MaterialArea, MaterialPDF, MaterialIndice) 
                VALUES 
                (:MaterialNombre, :MaterialAuditoria, :MaterialCompilacion, :MaterialISBN, :MaterialTiraje, :MaterialAutor, :MaterialVersion, :MaterialEdicion, :MaterialPaginas, :MaterialSeccion, :MaterialArea, :MaterialPDF, :MaterialIndice)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":MaterialNombre", $datosMaterial['nombre']);
                $queryP->bindValue(":MaterialAuditoria", $datosMaterial['tipo']);
                $queryP->bindValue(":MaterialCompilacion", $datosMaterial['tipo']);
                $queryP->bindValue(":MaterialISBN", $datosMaterial['ISBN']);
                $queryP->bindValue(":MaterialTiraje", $datosMaterial['tiraje']);
                $queryP->bindValue(":MaterialAutor", $datosMaterial['autor']);
                $queryP->bindValue(":MaterialVersion", $datosMaterial['version']);
                $queryP->bindValue(":MaterialEdicion", $datosMaterial['año']);
                $queryP->bindValue(":MaterialPaginas", $datosMaterial['paginas']);
                $queryP->bindValue(":MaterialSeccion", $datosMaterial['seccion']);
                $queryP->bindValue(":MaterialArea", $datosMaterial['area']);
                $queryP->bindValue(":MaterialPDF", $rutaArchivobdPDF);
                $queryP->bindValue(":MaterialIndice", $rutaArchivobdIndice);

                $queryP->execute();
                $connect->commit();

                if (move_uploaded_file($_FILES["material"]["tmp_name"], $rutaArchivoPDF)&move_uploaded_file($_FILES["indice"]["tmp_name"], $rutaArchivoIndice)) {
                    echo '<script language="javascript">
                    alert("El documento se ha subido correctamente");
                    </script>';
                } else {
                    echo '<script language="javascript">
                            alert("No se ha podido subir el archivo, consulte al administrador. Error al subir documento");
                            </script>';
                }

                return TRUE;

            } catch (PDOException $ex) {
                print "Error:" . $ex->getMessage() . die();
                $connect->rollback();
                return FALSE;
            }
        }

    }

?>