<?php

/*********************************
 * date: 10/03/2023              *
 * autor: Iván                   *
 *********************************/

class UpdateMaterial
{

    public $connection;
    public $selectPaths;


    public function __construct()
    {
        $this->connection = new Conexion();
        $this->selectPaths = new SelectMaterials();
    }

    /**
     * Realiza el UPDATE para deshabilitar un material en la tabla de material.
     * @param integer $datosMaterial arreglo que contiene: el id del material para ser deshabilitado/habilitado.
     */
    public function toggleEstadoMaterial($idMaterial, $estado)
    {
        try {
            $connect = $this->connection->conectar();

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            if ($estado == 1) {
                $query = "UPDATE material SET MaterialEstado = 0 WHERE Material_id = :Material_id";
            } else {
                $query = "UPDATE material SET MaterialEstado = 1 WHERE Material_id = :Material_id";
            }

            $queryP = $connect->prepare($query);

            $queryP->bindValue(":Material_id", $idMaterial);

            $queryP->execute();

            return $connect->commit();
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage() . die();
            return FALSE;
        }
    }
    /**
     * Realiza UPDATE para actualizar todos los datos de la BD a excepcion de las rutas de indice, material
     * nombre y estado.
     */
    public function actualizarMaterial($datosMaterial)
    {
        try {
            $connect = $this->connection->conectar();

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "UPDATE material SET MaterialNombre = :NombreMaterial, MaterialAutor = :Autor, MaterialVersion = :VersionM, MaterialEdicion = :AnioEdicion, MaterialPaginas = :NoPaginas, Area_Id = :Area, MaterialISBN = :Isbn, MaterialTiraje = :Tiraje  WHERE Material_Id = :Material_Id";

            $queryP = $connect->prepare($query);

            $queryP->bindValue(":Material_Id", $datosMaterial['idMaterial']);
            $queryP->bindValue(":NombreMaterial", $datosMaterial['NombreMaterial']);
            $queryP->bindValue(":Autor", $datosMaterial['Autor']);
            $queryP->bindValue(":VersionM", $datosMaterial['VersionM']);
            $queryP->bindValue(":AnioEdicion", $datosMaterial['AnioEdicion']);
            $queryP->bindValue(":NoPaginas", $datosMaterial['NoPaginas']);

            $queryP->bindValue(":Area", $datosMaterial['Area']);
            $queryP->bindValue(":Isbn", $datosMaterial['Isbn']);
            $queryP->bindValue(":Tiraje", $datosMaterial['Tiraje']);

            $queryP->execute();

            $status = $connect->commit();
            if ($datosMaterial['cambioNombre']) {
                $this->actualizarNombreArchivos($datosMaterial['idMaterial'],$datosMaterial['NombreMaterial']);
            }

            return $status;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage() /*.die() */;
            return false;
        }
    }
    /**
     * Actualiza los nombres en las rutas de los archivos del material y el indice, 
     * asi como los archivos como tal
     */
    public function actualizarNombreArchivos($id, $nombreMaterial)
    {
        try {
            $connect = $this->connection->conectar();
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $paths = $this->selectPaths->getPathsMaterial($id);
            $nombreArchivo = str_replace(' ', '_', $nombreMaterial);
            $nombrePdf = $nombreArchivo . "_" . $id . ".pdf";
            $nombreIndice = $nombreArchivo . "_Indice_" . $id . ".pdf";
            $rutaArchivoPDF = __DIR__ . "/../../material/pdf/";
            $rutaArchivoIndice = __DIR__ . "/../../material/indice/";

            if (rename($rutaArchivoIndice . basename($paths['MaterialIndice']), $rutaArchivoIndice . $nombreIndice)) {
                $rutaArchivoIndice = "/inventario_dgtic/material/indice/" . $nombreIndice;
            }
            if (rename($rutaArchivoPDF . basename($paths['MaterialPDF']), $rutaArchivoPDF . $nombrePdf)) {
                $rutaArchivoPDF = "/inventario_dgtic/material/indice/" . $nombrePdf;
            }
            $query = "UPDATE material SET MaterialPDF = :MaterialPDF, MaterialIndice = :Indice WHERE Material_Id = :Material_Id";
            $queryP = $connect->prepare($query);

            $queryP->bindValue(":MaterialPDF", $rutaArchivoPDF);
            $queryP->bindValue(":Indice", $rutaArchivoIndice);
            $queryP->bindValue(":Material_Id", $id);
            $queryP->execute();
            return $connect->commit();
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage() /*.die() */;
            return false;
        }
    }
}
