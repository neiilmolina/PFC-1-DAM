<?php
    /**
     * Conexión a la base de datos para recoger el contendio de la tabla 'coches'
     * -    Donde está la base de datos
     * -    Cual es el puerto de la base de datos.
     * -    Como se llama la base de datos.
     * -    Como se llama el usario con el que me voy a conectar.
     * -    Cual es la contraseña del usuario con el que me voy a conectar.
     */

    class Database {
        public static function conectar(){
            $driver = "mysql"; // Qué tipo de base de datos voy a utilizar.
            $host = 'localhost'; // 127.0.0.1
            $port = '3306';
            $bd = 'ecoscooter';
            $user = 'root'; // Esto tiene que cambiar, se crea uno nuevo con permisos.
            $password = ""; // Esto también cambia
    
            $dsn = "$driver:dbname=$bd;host=$host;port=$port";
    
            try {
                $gbd = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
            }
    
            return $gbd;
        }
    
        public function get($sql){
            $resultados = self::conectar()->query($sql); // "self" es "this" en Java
            return $resultados;
        }

        public function getAll($tabla){
            $sql = "SELECT * FROM $tabla"; 
            $resultados = self::conectar()->query($sql); // "self" es "this" en Java
            return $resultados;
        }

        public function delete($tabla, $id){
            $sql = "DELETE FROM $tabla WHERE id = $id"; 
            self::conectar()->query($sql);
        }
    }
        
?>