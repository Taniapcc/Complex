<?php
   
       class Mysql extends Conexion{
        private $db;
        private $query;
        private $arrvalues;
   
      public function __construct()
    {
        require_once("Conexion.php");
        $this->db = Conexion::conect();
       // $this->arrvalues=array();
    }

    //buscar
    public function select (string $query){
        $this->query = $query;
        $smt = $this->db->prepare ($this->query);
        $smt->execute();
        $data = $smt->fetch(PDO::FETCH_ASSOC);
        $smt = "";
        return $data;                    
    }

    //Obtener todos los registros
    public function select_all (string $query){

        $this->query = $query;
        $smt = $this->db->prepare ($this->query);
        $smt->execute();
        $data = $smt->fetchall(PDO::FETCH_ASSOC);
        $smt= "";
        return $data;                    
    }

    // Insertar 
    public function insertar(string $query, array $arrvalues){
        /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */

            $this->query = $query;
           // $this->query = "INSERT INTO usuarios(nombre,edad) VALUES (?,?)";
            $this->arrvalues= $arrvalues;           
            $smt = $this->db ->prepare ($this->query);
            $resSmt =  $smt ->execute($this->$arrvalues);
            //$resSmt =  $smt ->execute(array("Tania",45));

            if ($resSmt) {
               $lastInsert = $this->db->lastInsertId();
            }else{
                $lastInsert = 0;
            }    
            $lastInsert = 1;

         return $lastInsert;                    
        }

        //Update
        public function updates (string $query, array $arrvalues){
            $this->query = $query;
            $this->arrvalues= $arrvalues;
            $smt = $this->db->prepare ($this->query);
            $resSmt = $smt->execute($this->arrvalues);                   
         return $resSmt;                    
        }

         //Delete
         public function deletes (string $query){
            $this->query = $query;
            $smt = $this->db->prepare ($this->query);
            $resSmt = $smt->execute();                     
         return $resSmt;                    
        }

        public  function ejecutarConsulta_retornarID(string $query)
        {
           $this->query = $query;
           $smt = $this->db->prepare ($this->query);
           $smt->execute();
           $id = $this->db->lastInsertId();          	
           return $id;	
        }  
    }

?>