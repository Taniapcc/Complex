<?php 
 require_once "global.php";

 class Conexion extends PDO { 
   private $motor = DB_MOTORBASE;
   private $host = DB_HOST;
   private $dbname = DB_NAME;
   private $user = DB_USERNAME;
   private $contrasena = DB_PASSWORD;
   private $port = DB_PORT;
   private $charset = DB_ENCODE;
  // private $password = DB_PASSWORD;
   //private $dsn=$motor.':host='.$host.';dbname='.$dbname.';port='.$port.';charset='.$charset;
    
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      
      try{
         parent::__construct("{$this->motor}:dbname={$this->dbname};host={$this->host};port={$this->port};
          charset={$this->charset}", $this->user, $this->contrasena);
          //echo 'Conexion Realizada PDO';
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
        
   }

      
   
   public static function ejecutarConsulta($sql)
      {
         $conexion = new Conexion(); 
    
         $consulta = $conexion ->prepare ($sql);
         $consulta->execute();
         $conexion = "";	
         return $consulta;
      }

      public static function ejecutarConsultaSimpleFila($sql)
      {
         $conexion = new Conexion(); 
         $consulta = $conexion ->prepare ($sql);
         $consulta->execute();
         $row = $consulta->fetch(PDO::FETCH_OBJ);	
         $conexion = "";
         return $row;

      }
      
      public static function ejecutarConsulta_retornarID($sql)
      {
         $conexion = new Conexion(); 
         $consulta = $conexion ->prepare ($sql);
         $consulta->execute();
         $id = $conexion->lastInsertId(); 
         $conexion = "";	
         return $id;			
      }
      
     public function desconectar($pdo,$smt){
       // global $pdo,$smt
        $smt ->closeCursor();
        $smt = null;
        $pdo = null;

     }

     public static  function limpiarCadena($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = htmlentities(addslashes($data));
		return $data;
     }
     
     public function listarMatriz($sql){
      $conexion = new Conexion(); 
      $consulta = $conexion ->prepare ($sql);
      $consulta->execute();

      foreach ($consulta as $row){
         $lista[] =$row;
      }
      return $lista;
    }

    public function listarMatriz2($sql){
      $conexion = new Conexion(); 
      $consulta = $conexion ->prepare ($sql);
      $consulta->execute();
      $row = $consulta->fetch();
      return $row;
    }
	
     

 } 
?>