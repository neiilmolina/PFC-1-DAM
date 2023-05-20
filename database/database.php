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
    
        public function getById($tabla,$id){
            $sql = "SELECT * FROM $tabla WHERE id = $id";
            $resultados = self::conectar()->query($sql); // "self" es "this" en Java
            return $resultados->fetch(PDO::FETCH_ASSOC);
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

        public function save($tabla, $nombres ,$valores){
            $comprobarNumero = false;
            $poscionNumero;

            $sql = "INSERT INTO $tabla(";
             // Pintar campos
             for($i = 0; $i <count($nombres); $i++){
                $sql = $sql . $nombres[$i]. ", ";
                if($nombres[$i] == 'precio' || $nombres[$i]=='rol_id'){
                    $comprobarNumero = true;
                    // array_push($poscionNumero, $i);
                    $poscionNumero = $i;
                    echo 'la posicion es: '. $poscionNumero;
                }
             }
             // Pintar valores
             $sql = substr($sql, 0, strlen($sql) - 2);
             $sql = $sql . ")VALUES(";
             for($i = 0; $i< count($valores); $i++){
                if($comprobarNumero && $poscionNumero == $i){
                    $sql = $sql . $valores[$i] . ", ";
                } else {
                    $sql = $sql . "'".$valores[$i] . "', ";
                }

             }
             $sql = substr($sql, 0, strlen($sql) - 2);
             $sql = $sql . ");";
              
            self::conectar()->query($sql);
        } 
        
        public function update($tabla, $nombres, $valores){
            $comprobarPrecio = false;
            $posicionPrecio;
            $sql = "UPDATE $tabla SET ";
            
            // Pintar campos con valores
            for($i = 1; $i<count($nombres); $i++){
                if($nombres[$i] == 'precio' || $nombres[$i]=='rol_id'){
                    $sql = $sql . $nombres[$i] . "= " . $valores[$i] .", ";
                } else{
                    $sql = $sql . $nombres[$i] . "= '" . $valores[$i] ."', ";
                }
            }
            // Pintar WHERE
            $sql = substr($sql, 0, strlen($sql) - 2);
            $sql = $sql . " WHERE id = $valores[0]";
            self::conectar()->exec($sql);
        }

        public function login($email, $pass){
            $sql = "SELECT * FROM usuario WHERE email='$email' AND password = '$pass'";
            $user = self::conectar()->query($sql);
            if($user != null){
                return $user->fetch(PDO::FETCH_ASSOC);
            }
            return null;
          }
    }
        
?>