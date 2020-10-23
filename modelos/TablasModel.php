<?php
    class TablasModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      
     function mostrar( $id)
        {
           $sql="SELECT * FROM auxiliares where idauxiliares = '$id'";
           $request = $this->ejecutarConsultaSimpleFila($sql);
           
           return $request;
        } 

   function validaNombre($nombre){
            $nombre = strtoupper($nombre);
            $sql = "SELECT * FROM auxiliares WHERE nombre = '$nombre'";  
                
            $rows = $this->queryRows($sql); 
            return $rows;                 
            //return ($rows>0)?true:false;
        }   
        
     function editar ($data){   
        
            $idauxiliares = $data["idauxiliares"];            
            $nombre =  strtoupper($data["nombre"]);                    
            $descripcion = $data["descripcion"];
            $fecha = date("Y-m-d H:i:s");
                     
             $sql = "UPDATE auxiliares SET  
                          nombre = '$nombre', 
                          descripcion = '$descripcion'                           
                     WHERE idauxiliares = '$idauxiliares'";
                         
             $r = $this->ejecutarConsulta($sql);              
              
            return $r;
        }   


      //Implementar un método para listar los registros
	 function listar()
     {
         $sql="select * from auxiliares where idsubtabla = 0";
         $data = $this->ejecutarConsultaMatriz($sql);
         return $data;					
     }

     function desactivar($id)
     {
       
        $sql=" UPDATE auxiliares SET condicion = 0
        WHERE idauxiliares = '$id' ";

         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     function activar($id)
     {
               
        $sql=" UPDATE auxiliares SET condicion = 1
        WHERE idauxiliares = '$id' ";
         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     
     function alta($data){

        $r = false;
        $nombre = strtoupper($data['nombre']);
        $descripcion = $data['descripcion'];            
             
        $sql= "INSERT INTO auxiliares (nombre, descripcion ) VALUES (?,?)";

        $arrData = array($nombre,                          
                          $descripcion                          
                           );

        $r = $this->insert($sql, $arrData); 
                                     
        
        return $r;


      }

  


    }
?>
