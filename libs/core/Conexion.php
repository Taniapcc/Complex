<?php 
 require_once "config/global.php";

 class Conexion  { 
    private $conexion;
   
   public function __construct(){
         
    $motor = DB_MOTORBASE;
    $host = DB_HOST;
    $dbname = DB_NAME;
    $user = DB_USERNAME;
    $contrasena = DB_PASSWORD;
    $port = DB_PORT;
    $charset = DB_ENCODE;
    
    try {
      $conexion = new PDO("$motor:host=$host;dbname=$dbname;port= $port", $user, $contrasena);       
      $conexion -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion -> exec("SET CHARACTER SET $charset");
      $conexion = new PDO('mysql:host=localhost;dbname=dbtienda','root','');
      //echo "conexion realizada";
    } catch (Exception $e) {
      //die("Error".$e->getMessage());
     echo "Linea de error". $e->getLine();
    } 

    $this->conexion = $conexion;
   // return $this->$conexion;
  }

  public function conexion(){
    return $this->conexion;
  }


       
   }

   

?>