<?php
    class CategoriaModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      
     //Implementamos un método para insertar registros
     
     public function insertar($nombre,$descripcion)
     {
         $sql = "INSERT INTO categoria (nombre,descripcion) VALUES (?,?)";
         $arrData = array($nombre,$descripcion);
        $request = $this->insert($sql, $arrData);
        return $request;		
	 }

	//Implementamos un método para actualizar

    public function actualizar($idcategoria,$descripcion)
	{     
        $sql = "UPDATE  categoria SET  descripcion = ? 
         WHERE idcategoria ='$idcategoria'";
        $arrData = array ($descripcion);
        $request = $this->update($sql, $arrData);
        return $request;
       }


//Implementamos un método para actualizar
       
       public function borrarCategoria (int $idcategoria)
       {
           $sql = "DELETE FROM  categoria  
                   WHERE idcategoria ='$idcategoria'";
           $request = $this->borrarCategoria($idcategoria);
           return $request;
       }

    //Implementamos un método para desactivar categorías
    	
	public function desactivar($idcategoria)
	{   
		$sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
		$request = $this->cambiarEstado($sql);
           return $request;		
	}

	//Implementamos un método para activar categorías
	
	public function activar($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
		$request = $this->cambiarEstado($sql);
        return $request;	
	}
	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
		//$sql= "CALL spMostrarCategoria ('$idcategoria')";
        $request = $this->select($sql);
        return $request;
	}
	
	//Implementar un método para listar los registros
	public function listar()
	{
        $sql="SELECT * FROM categoria";
        $request = $this->ejecutarConsultaMatriz($sql);
        return $request;					
	}

    //Implementar un método para listar los registros y mostrar en el select
	public function comboSelect()
	{
		$sql="SELECT * FROM categoria where condicion = 1";
		$request = $this->select_all($sql);
        return $request;			
    }
    

    


    }
?>
