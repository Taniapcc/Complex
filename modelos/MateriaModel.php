<?php
    class MateriaModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      

     function mostrar( $id)
        {
           $sql="SELECT * FROM categoria where idcategoria = '$id' ";
           $request = $this->ejecutarConsultaSimpleFila($sql);
           
           return $request;
        } 

   function validaNombre($nombre){
            $nombre = strtoupper($nombre);
            $sql = "SELECT * FROM categoria WHERE nombre = '$nombre' ";  
                
            $rows = $this->queryRows($sql); 
            return $rows;                 
            //return ($rows>0)?true:false;
        }   
        
     function editar ($data){   
        
            $idcategoria = $data["idcategoria"];            
            $nombre =  strtoupper($data["nombre"]);                    
            $descripcion = $data["descripcion"];
            $fecha = date("Y-m-d H:i:s");
                     
             $sql = "UPDATE categoria SET  
                          nombre = '$nombre', 
                          descripcion = '$descripcion'                           
                     WHERE idcategoria = '$idcategoria'";
                         
             $r = $this->ejecutarConsulta($sql);              
              
            return $r;
        }   


      //Implementar un método para listar los registros
	 function listar()
     {
         $sql=" SELECT *  FROM categoria and tipo = 2";
         $request = $this->ejecutarConsultaMatriz($sql);
         return $request;					
     }

     function desactivar($id)
     {
       
        $sql=" UPDATE categoria SET condicion = 0
        WHERE idcategoria = '$id' ";

         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     function activar($id)
     {
               
        $sql=" UPDATE categoria SET condicion = 1
        WHERE idcategoria = '$id' ";
         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     
     function alta($data){

        $r = false;
        $nombre = strtoupper($data['nombre']);
        $descripcion = $data['descripcion'];            
             
        $sql= "INSERT INTO categoria (nombre, descripcion ) VALUES (?,?)";

        $arrData = array($nombre,                          
                          $descripcion                          
                           );

        $r = $this->insert($sql, $arrData); 
                                     
        
        return $r;


      }

  


    }
?>
