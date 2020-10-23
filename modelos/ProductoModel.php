<?php
    class ProductoModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      
     function mostrar( $id)
        {
           $sql="SELECT * FROM producto where idproducto = '$id'";
           $request = $this->ejecutarConsultaSimpleFila($sql);
           
           return $request;
        } 

   function validaNombre($nombre){
            $nombre = strtoupper($nombre);
            $sql = "SELECT * FROM producto WHERE nombre = '$nombre'";  
                
            $rows = $this->queryRows($sql); 
            return $rows;                 
            //return ($rows>0)?true:false;
        }   
        
     function editar ($data){   
        
            $idproducto = $data["idproducto"];            
            $nombre =  strtoupper($data["nombre"]);                    
            $descripcion = $data["descripcion"];
            $fecha = date("Y-m-d H:i:s");
                     
             $sql = "UPDATE producto SET  
                          nombre = '$nombre', 
                          descripcion = '$descripcion'                           
                     WHERE idproducto = '$idproducto'";
                         
             $r = $this->ejecutarConsulta($sql);              
              
            return $r;
        }   


      //Implementar un método para listar los registros
	 function listar()
     {
         $sql="select * from producto";
         $data = $this->ejecutarConsultaMatriz($sql);
         return $data;					
     }

     function desactivar($id)
     {
       
        $sql=" UPDATE producto SET condicion = 0
        WHERE idproducto = '$id' ";

         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     function activar($id)
     {
               
        $sql=" UPDATE producto SET condicion = 1
        WHERE idproducto = '$id' ";
         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     
     function alta($data){

        $r = false;
        $nombre = strtoupper($data['nombre']);
        $descripcion = $data['descripcion'];            
             
        $sql= "INSERT INTO producto (nombre, descripcion ) VALUES (?,?)";

        $arrData = array($nombre,                          
                          $descripcion                          
                           );

        $r = $this->insert($sql, $arrData); 
                                     
        
        return $r;


      }

  


    }
?>
