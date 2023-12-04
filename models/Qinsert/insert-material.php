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
            //Se realiza la conexión a la base de datos.
            $connect = $this->connection->conectar();

            $test = "SELECT COUNT(*) AS total
            FROM material
            WHERE (MaterialNombre = :nombre 
                   AND MaterialAutor = :autor 
                   AND MaterialVersion = :versionM)
                   OR (MaterialISBN = :ISBN AND MaterialISBN <> 'N/A')";

            $testP = $connect->prepare($test);
            $testP->bindValue(":nombre", $datosMaterial['nombre']);
            $testP->bindValue(":autor", $datosMaterial['autor']); // Asegúrate de tener $datosMaterial['autor'] definido
            $testP->bindValue(":ISBN", $datosMaterial['ISBN']);
            $testP->bindValue(":versionM", $datosMaterial['version']);
            $testP->execute();

            $total = $testP->fetchColumn();

            if ($total == 0) {

                try {
                    //Se realiza la conexión a la base de datos.
                    $connect = $this->connection->conectar();

                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $connect->beginTransaction();

                    // Obtener información del archivo subido
                    $nombrePdf = basename($datosMaterial['material']["name"]);
                    $nombreIndice = basename($datosMaterial['indice']["name"]);

                    //Cambiamos los espacios por guión bajo
                    $nombreArchivo = str_replace(' ', '_', $datosMaterial['nombre']);

                    // Obtener la extensión del archivo
                    $extensionPDF = pathinfo($nombrePdf, PATHINFO_EXTENSION);
                    $extensionIndice = pathinfo($nombreIndice, PATHINFO_EXTENSION);

                    //Ruta donde se va a guardar el archivo
                    $rutaArchivoPDF = PDF . $nombrePdf;
                    $rutaArchivoIndice = INDICE . $nombreIndice;

                    if (!move_uploaded_file($datosMaterial['material']["tmp_name"], $rutaArchivoPDF)) {
                        echo '<script language="javascript">
                        alert("Error al cargar el archivo");
                        </script>';
                    }

                    move_uploaded_file($datosMaterial['indice']["tmp_name"], $rutaArchivoIndice);

                    //Función para renombrar los archivos una vez que esten guardados en su carpeta
                    function renombrarArchivo($ruta, $nuevoNombre) {
                        if (file_exists($ruta)) {
                            $infoArchivo = pathinfo($ruta);
                            $nuevaRuta = $infoArchivo['dirname'] . '/' . $nuevoNombre . '.' . $infoArchivo['extension'];
                            return rename($ruta, $nuevaRuta);
                        }
                        return false;
                    }

                    // Renombrar el archivo PDF
                    if (renombrarArchivo($rutaArchivoPDF, $nombreArchivo)) {
                    } else {
                        echo '<script language="javascript">
                        alert("Error al renombrar el archivo");
                        </script>';
                    }

                    // Renombrar el archivo de índice
                    if (renombrarArchivo($rutaArchivoIndice, $nombreArchivo . "_Indice")) {
                    } else {
                        echo '<script language="javascript">
                        alert("Error al renombrar el archivo");
                        </script>';
                    }

                    //Ruta de Archivo en BD.
                    $rutaArchivobdPDF ="/inventario_dgtic/material/pdf/" . $nombreArchivo. "." . $extensionPDF;
                    $rutaArchivobdIndice ="/inventario_dgtic/material/indice/" . $nombreArchivo . "_Indice." . $extensionIndice;

                    $query = 'INSERT INTO material (MaterialNombre, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, MaterialEdicion, MaterialPaginas, Area_Id, MaterialPDF, MaterialIndice) 
                    VALUES 
                    (:MaterialNombre, :MaterialISBN, :MaterialTiraje, :MaterialAutor, :MaterialVersion, :MaterialEdicion, :MaterialPaginas, :Area_Id, :MaterialPDF, :MaterialIndice)';

                    $queryP = $connect->prepare($query);

                    $queryP->bindValue(":MaterialNombre", $datosMaterial['nombre']);
                    $queryP->bindValue(":MaterialISBN", $datosMaterial['ISBN']);
                    $queryP->bindValue(":MaterialTiraje", $datosMaterial['tiraje']);
                    $queryP->bindValue(":MaterialAutor", $datosMaterial['autor']);
                    $queryP->bindValue(":MaterialVersion", $datosMaterial['version']);
                    $queryP->bindValue(":MaterialEdicion", $datosMaterial['año']);
                    $queryP->bindValue(":MaterialPaginas", $datosMaterial['paginas']);
                    $queryP->bindValue(":Area_Id", $datosMaterial['area']);
                    $queryP->bindValue(":MaterialPDF", $rutaArchivobdPDF);
                    $queryP->bindValue(":MaterialIndice", $rutaArchivobdIndice);

                    $queryP->execute();
                    $connect->commit();

                    return TRUE;

                } catch (PDOException $ex) {
                    print "Error:" . $ex->getMessage() . die();
                    $connect->rollback();
                    return FALSE;
                }

            }else{
                //si ya existe el registro
                echo '<script language="javascript">
                alert("El nombre de archivo o ISBN proporcionado ya se encuentra en el sistema");
                </script>';
                return false;
            }
        }

    }

?>