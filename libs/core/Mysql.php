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

    //Query regresa un valor booleano
    function ejecutarConsulta($sql)
    {
       $this->sql = $sql;
       $consulta = $this->db->prepare ($this->sql);
       $consulta->execute(); 
       return $consulta;       
    }

       
     function queryNoSelect($sql){
        $this->sql = $sql;
        $consulta = $this->db->prepare ($this->sql);
        $consulta->execute();    
        return $consulta;
      }

      //Query regresa un solo registro en un arreglo asociado

     function ejecutarConsultaSimpleFila($sql)
      {
         $this->sql = $sql; 
         $consulta = $this->db->prepare ($this->sql);
         $consulta->execute();
         $row = $consulta->fetch(PDO::FETCH_ASSOC);                 
         return $row;

      }

     function select (string $sql){
         $this->sql = $sql;
         $consulta= $this->db->prepare($sql);   
         $consulta->execute();          
         $row = $consulta->fetch(PDO::FETCH_ASSOC);
                  
        return $row;                    
    }

    function ejecutarConsultaMatriz($sql)
      {
         $this->sql = $sql; 
         $consulta = $this->db->prepare ($this->sql);
         $consulta->execute();
         $row = $consulta->fetchall(PDO::FETCH_ASSOC);                 
         return $row;

      }


    //Obtener todos los registros
    function select_all (string $sql){
      $this->sql = $sql;
      $consulta = $this->db->prepare ($sql);
      $consulta->execute();
      $data = $consulta->fetchall(PDO::FETCH_ASSOC);
      return $data;                    
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
        $consulta = $this->db->prepare($this->sql);
        $consulta->execute();
        $rows = $consulta->rowCount();               
        return $rows;
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
            $consulta = $this->db->prepare ($this->sql);
            $resSmt = $consulta->execute();                     
         return $resSmt;                    
        }


        //Cambiar estado
        public function cambiarEstado (string $sql){
            $this->sql = $sql;
            $consulta = $this->db->prepare ($this->sql);
            $resSmt = $consulta->execute();                     
         return $resSmt;                    
        }

    }

?>