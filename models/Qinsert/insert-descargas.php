<?php
//Se importa el archivo para conectarse a la bd    
class InsertDescargas
{
    //Conexion
    public $connection;

    //Método constructor para instanciar la clase Conexion
    public function __construct()
    {
        $this->connection = new Conexion();
    }

    /**
     * Realiza el INSERT en la tabla de descargas.
     * @param integer $datosDescarga arreglo que contiene los datos de la descarga
     *                $datosDescarga['cantidad'] Cantidad de descargas pedidas
     *                $datosDescarga['idMaterial'] Id del Material descargado
     *                $datosDescarga['fecha'] Dia de la descarga
     *                $datosDescarga['idUsuario'] Persona que realiza la descarga
     *                $datosDescarga['idSede'] Sede que solicito la descarga
     */
    public function registrarDescarga($datosDescarga)
    {
        try {
            //Se realiza la conexión a la base de datos.
            $connect = $this->connection->conectar();

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();
            $query = 'INSERT INTO descargas VALUES (NULL, :Sede_Id, :Usuario_Id, :Material_Id, :fecha, :CantidadDescargas)';
            $queryP = $connect->prepare($query);

            $queryP->bindValue(":Sede_Id", $datosDescarga['idSede']);
            $queryP->bindValue(":Usuario_Id", $datosDescarga['idUsuario']);
            $queryP->bindValue(":Material_Id", $datosDescarga['idMaterial']);
            $queryP->bindValue(":fecha", $datosDescarga['fecha']);
            $queryP->bindValue(":CantidadDescargas", $datosDescarga['cantidad']);

            $queryP->execute();
            return $connect->commit();

        } catch (PDOException $ex) {
            print "Error:" . $ex->getMessage() . die();
            $connect->rollback();
            return false;
        }
    }
}
