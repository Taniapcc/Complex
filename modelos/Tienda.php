<?php 
//Incluímos inicialmente la conexión a la base de datos

require_once '../config/Conexion.php';
Class Tienda
{
	private $idTienda;
	private $nombre;
	private $provincia;
	private $ciudad;
	
    public function __construct()
	{

	}


	 //Implementamos un método para insertar registros
	 
	 public function insertar ($nombre,$provincia,$ciudad,$direccion)
	 {	 
		 
		 $sql="INSERT INTO tienda (nombre,provincia,ciudad,direccion,condicion)
		 VALUES ('$nombre','$provincia','$ciudad','$direccion','1')";
		 return Conexion::ejecutarConsulta($sql);
	 }

	//Implementamos un método para editar registros

	public function editar($idtienda,$nombre,$provincia,$ciudad,$direccion)
	{
		$sql="UPDATE tienda SET nombre='$nombre',
		provincia='$provincia', 
		ciudad='$ciudad', 
		direccion='$direccion' 
		WHERE idtienda='$idtienda'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	
	public function desactivar($idtienda)
	{   
		$sql="UPDATE tienda SET condicion='0' WHERE idtienda='$idtienda'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método para activar categorías
	

	public function activar($idtienda)
	{
		$sql="UPDATE tienda SET condicion='1' WHERE idtienda='$idtienda'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idtienda)
	{
		$sql="SELECT * FROM tienda WHERE idtienda='$idtienda'";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	public function listar()
	{
		$sql="SELECT * FROM tienda";
		return Conexion::ejecutarConsulta($sql);				
	}

//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT idtienda,nombre,provincia,ciudad,direccion,condicion FROM tienda where condicion = 1";
		return Conexion::ejecutarConsulta($sql);		
	}
	
 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	


	
}

?>