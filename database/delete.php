<?php
    /**
     * OBJETIVO
     * 1. Recoger el id del elemento que hay que eliminar.
     * 2. Realizar la sentencia SQL que elimina un elemento con el id recogido.
     * 3. Devolver la vista al index
     */

     if(isset($_GET['id'])){
      if(isset($_GET['tabla'])){
         $tabla = $_GET['tabla'];
            // 1. GET['id'] 
           $id = $_GET['id'];
           // 2. Importar la clase Database para poder 
          require_once('database.php');
          $database = new database();
          $database->delete($tabla, $id);
   
          // 3. Redireccionar al index
          // no me borra ya que hay id´s que son claves foraneas en otras tablas
          
          echo 'Se ha eliminado';
          header('Location: ../admin.php?nombre=' . $tabla);
      } else{
         echo 'error nombre';
      }
     } else{
        echo 'Error 404';
     }



?>