<?php 

/********************************
    Author: Roan                *
    Date:27/04/23               *
    programa: conexión a la BD  *
*********************************/

    class Conexion {
        //Se crean atributos de la clase conexión
        private $host;
        private $dbName;
        private $user;
        private $password;
        //Conexión estática
        private static $connection;

        //Constructor
        public function __construct()
        {
            //host al que se va a conectar
            $this -> host = 'localhost';
            //nombre de la base de datos
            $this -> dbName = 'sistemainventario';
            //Usuario con el que se va a identificar
            $this -> user = 'root';
            //Contraseña para acceder a la bd
            $this -> password = '';

        }

        public function conectar(){
            try {
                if (is_null(self::$connection)) {
                    //Realizar la conexión
                    self::$connection = new PDO("mysql:host=$this->host; dbname=$this->dbName", $this->user, $this->password);
                }
                return self::$connection;
            } catch (Error $e) {
                //Imprimir el error
                echo 'Error en la conexión a la base de datos: ' . $e->getLine();
                die();
            }
            return NULL;
        }

    }

?>