<?php
   
       class Mysql extends Conexion{
        private $db;
        private $sql;
        private $arrvalues;
   
      public function __construct()
    {
         $this->db = new Conexion();
         $this->db = $this->db->conexion();
    }

    // Insertar 
    public function insert(string $sql, array $arrvalues){
      /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
          $this->sql = $sql;
          $this->arrvalues = $arrvalues;
          $insert = $this->db ->prepare ($this->sql);
          $resSmt =  $insert ->execute($this->arrvalues);
          
          if ($resSmt) {
             $lastInsert = $this->db->lastInsertId();
          }else{
              $lastInsert = 0;
          }    
         
       return  $lastInsert;                    
      }

    // Numero de filas
    function queryRows($sql){
        $this->sql = $sql;
        $reg = $this->db->prepare($this->sql);
        $reg->execute();
        $rows = $reg->rowCount();               
        return $rows;
      }

    //Query regresa un valor booleano
  function queryNoSelect($sql){
    $this->sql = $sql;
    $r = $this->db->prepare ($this->sql);
    $r->execute();    
    return $r;
  }

   //Query regresa un solo registro en un arreglo asociado
   
    public function select (string $sql){
          $this->sql = $sql;
         /*contar registros */
         $smt = $this->db->prepare($sql);   
         $smt->execute();          
          $data = $smt->fetch(PDO::FETCH_ASSOC);
            //$data = $smt->fetch(PDO::FETCH_OBJ);       
        return $data;                    
    }

    //Obtener todos los registros
    public function select_all (string $sql){
        $this->sql = $sql;
        $smt = $this->db->prepare ($sql);
        $smt->execute();
        $data = $smt->fetchall(PDO::FETCH_ASSOC);
        return $data;                    
    }
    
     //Update
      public function update (string $sql, array $arrvalues){
            $this->sql = $sql;
            $this->arrvalues= $arrvalues;
            $smt = $this->db->prepare ($this->sql);
            $resSmt = $smt->execute($this->arrvalues);                   
         return $resSmt;                    
        }

        public  function ejecutarConsulta_retornarID(string $sql)
        {
           $this->sql = $sql;
           $smt = $this->db->prepare ($this->sql);
           $smt->execute();
           $id = $this->db->lastInsertId();          	
           return $id;	
        }
        
        //Delete
        public function eliminar (string $sql){
            $this->sql = $sql;
            $smt = $this->db->prepare ($this->sql);
            $resSmt = $smt->execute();                     
         return $resSmt;                    
        }


        //Cambiar estado
        public function cambiarEstado (string $sql){
            $this->sql = $sql;
            $smt = $this->db->prepare ($this->sql);
            $resSmt = $smt->execute();                     
         return $resSmt;                    
        }

    }

?>