<?php

class PDODB
{
    private $host; // Atributo HOST
    private $usuario; // Atributo Usuario
    private $pass; // Atributo Contraseña
    private $db; // Atributo Nombre de Base de datos
 
    private $connection; // Atributo Conexión, aquí se guardá la conexión una vez que se crea.
 
    function __construct() // Este método es el que le asigna los valores a cada atributo de la clase
                           // El valor asignado es el que esta entre Comillas.
    {
        $this->host = "localhost";
        $this->usuario = "root";
        $this->pass = "";
        $this->db = "tiendaanchetas"; //nombre de la base de datos 
    }
 
    function connect() // Este método lo que hace es definir a la variable $opciones algunas 
    // configuraciones como el tipo de escritura de texto, para que nos acepta la escritura latina.
    {
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //opciones de coneccion de la base de datos 
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );
        // En este siguiente punto exactamente se esta creando la conexión
        // al decir new PDO y dentro del paréntesis asignando los atributos todo eso queda asignado
        // al objeto connection
        $this->connection = new PDO( 
            'mysql:host=' . $this->host . ';dbname=' . $this->db,
            $this->usuario,
            $this->pass,
            $opciones
        );
    }
 
 
    function getData($sql) // Este método tiene como objetivo obtener datos, por ejemplo el listado
                           // de registros para ser mostrados en la tabla
    {
        try {
            $data = array();
            $result = $this->connection->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($data, $row);
                }
            }
            return $data;
        } catch (\Throwable $th) {
            die("Oh noes! There's an error in the query!");
        }
    } 

    function executeInstruction($sql) // Este método tiene como objetivo ejecutar instrucciones
    // como por ejemplo cuando vamos a guardar, modificar o eliminar un regístro en la base de datos.
    {
        try {
            $result = $this->connection->query($sql);
            return $result;
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!");
        }
    }
 
    function close() // Este método tiene como objetivo cerrar la conexión
                     // vaciando los valores del objeto connection.
    {
        $this->connection = null;
    }

    function login($sql) // Este método tiene como objetivo obtener datos, por ejemplo el listado
                           // de registros para ser mostrados en la tabla
    {
        try {
            $data = array();
            $result = $this->connection->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($data, $row);
                }
            }else{
                $data = false;
            }
            return $data;
        } catch (\Throwable $th) {
            die("Oh noes! There's an error in the query!");
        }
    } 

}
?>