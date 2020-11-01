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
      try {
          $this->sql = $sql;
          $consulta = $this->db->prepare($this->sql);
          $consulta->execute();
          return $consulta;
      }catch (PDOException $e){
        echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
      }   
             
    }

       
     function queryNoSelect($sql){
       try {
           $this->sql = $sql;
           $consulta = $this->db->prepare($this->sql);
           $consulta->execute();
           return $consulta;
       } catch (PDOException $e){
        echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
      }   
        
      }

      //Query regresa un solo registro en un arreglo asociado

     function ejecutarConsultaSimpleFila(string $sql)
      {
         try {
             $this->sql = $sql;
             $consulta = $this->db->prepare($this->sql);
             $consulta->execute();
             $row = $consulta->fetch(PDO::FETCH_ASSOC);
             return $row;
         }catch (PDOException $e){
          echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
        }   
         

      }

     function select (string $sql, array $arrvalues){
       try {
           $this->sql = $sql;
           $this->arrvalues = $arrvalues;
           $consulta= $this->db->prepare($this->sql);
           $consulta->execute($arrvalues);
           $row = $consulta->fetch(PDO::FETCH_ASSOC);                  
           return $row;
       } catch (PDOException $e){
        echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
      }                    
    }

    function ejecutarConsultaMatriz($sql)
      {
        try {
            $this->sql = $sql;
            $consulta = $this->db->prepare($this->sql);
            $consulta->execute();
            $row = $consulta->fetchall(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e){
          echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
        }   


      }


    //Obtener todos los registros
    function select_all (string $sql){
      try {
          $this->sql = $sql;
          $consulta = $this->db->prepare($sql);
          $consulta->execute();
          $data = $consulta->fetchall(PDO::FETCH_ASSOC);
          return $data;
      } catch (PDOException $e){
        echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
      }                     
  }


    // Insertar 
    public function insert(string $sql, array $arrvalues){
      /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
      try {
          $this->sql = $sql;
          $this->arrvalues = $arrvalues;
          $insert = $this->db ->prepare($this->sql);
          $resSmt =  $insert ->execute($this->arrvalues);
          
          if ($resSmt) {
              $lastInsert = $this->db->lastInsertId();
          } else {
              $lastInsert = 0;
          }
         
          return  $lastInsert;
      } catch (PDOException $e){
        echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
      }   
       
      }


      public function queryInsert(string $sql, array $arrvalues){
         /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
          try {
              $this->sql = $sql;
              $this->arrvalues = $arrvalues;
              $insert = $this->db ->prepare($this->sql);
              $resSmt =  $insert ->execute($this->arrvalues);
             
              if ($resSmt) {
                  $lastInsert = $this->db->lastInsertId();
              } else {
                  $lastInsert = 0;
              }

              return  $lastInsert;
          } catch (PDOException $e){
            echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
          }                  
         }

    // Numero de filas
    function queryRows($sql){
        try {
            $this->sql = $sql;
            $consulta = $this->db->prepare($this->sql);
            $consulta->execute();
            $rows = $consulta->rowCount();
            return $rows;
        }catch (PDOException $e){
          echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
        }   
      
      }

     //Update
      public function update (string $sql, array $arrvalues){
        try {
            $this->sql = $sql;
            
            $this->arrvalues= $arrvalues;
            $smt = $this->db->prepare($this->sql);
            $resSmt = $smt->execute($this->arrvalues);
            return $resSmt;
        } catch (PDOException $e){
          echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
        }   

        }

        public function queryUpdate (string $sql, array $arrvalues){
          try {
              $this->sql = $sql;
              
              $this->arrvalues= $arrvalues;
              $smt = $this->db->prepare($this->sql);
              $resSmt = $smt->execute($this->arrvalues);
              return $resSmt;
          } catch (PDOException $e){
            echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
          }   
  
          }


        public  function ejecutarConsulta_retornarID(string $sql)
        {
          try {
              $this->sql = $sql;
              $smt = $this->db->prepare($this->sql);
              $smt->execute();
              $id = $this->db->lastInsertId();
              return $id;
          } catch (PDOException $e){
            echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
          }   

        }
        
        //Delete
        public function eliminar (string $sql){
          try {
              $this->sql = $sql;
              $consulta = $this->db->prepare($this->sql);
              $resSmt = $consulta->execute();
              return $resSmt;
          }  catch (PDOException $e){
            echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
          }                 
        }


        //Cambiar estado
        public function cambiarEstado (string $sql){
          try {
              $this->sql = $sql;
              $consulta = $this->db->prepare($this->sql);
              $resSmt = $consulta->execute();
              return $resSmt;
          }   catch (PDOException $e){
            echo "PDOException Linea de error". $e->getLine(). "Linea: " .$e->getMessage();
          } 

        }

    }

?>