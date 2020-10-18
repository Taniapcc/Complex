<?php
    class RolesModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

         //Implementamos un método para insertar registros
     
      function insertar($nombre, $descripcion)
     {
        $sql = "INSERT INTO rol(nombre,edad) VALUES (?,?)";
        $arrData = array($nombre,$descripcion);
        $request = $this->insert($sql, $arrData);
        return $request;		
	 }

	//Implementamos un método para actualizar

	function editar($idrol,$nombre,$descripcion)
	{     
        $sql = "UPDATE  rol SET nombre = ?, descripcion = ? 
        WHERE idrol ='$idrol'";
        $arrData = array($nombre,$descripcion);
        $request = $this->update($sql, $arrData);
        return $request;
       }
       
    function borrar (int $idrol)
       {
           $sql = "DELETE FROM  rol  
                   WHERE idrol ='$idrol'";
           $request = $this->eliminar($sql);
           return $request;
       }

    //Implementamos un método para desactivar categorías
    	
	function desactivar($idrol)
	{   
		$sql="UPDATE rol SET condicion='0' WHERE idrol='$idrol'";
		$request = $this->cambiarEstado($sql);
           return $request;		
	}

	//Implementamos un método para activar categorías
	
	function activar($idrol)
	{
		$sql="UPDATE rol SET condicion='1' WHERE idrol='$idrol'";
		$request = $this->cambiarEstado($sql);
        return $request;	
	}
	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	function mostrar($idrol)
	{
		$sql="SELECT * FROM rol WHERE idrol='$idrol'";
		//$sql= "CALL spMostrarrol ('$idrol')";
        $request = $this->select($sql);
        return $request;
	}
	
	//Implementar un método para listar los registros
	 function listar()
	{
        $sql="SELECT * FROM rol";
        $request = $this->select_all($sql);
        return $request;					
	}

    //Implementar un método para listar los registros y mostrar en el select
	public function comboSelect()
	{
		$sql="SELECT * FROM rol where condicion = 1";
		$request = $this->select_all($sql);
        return $request;			
	}



        



    }

    
    

?>
