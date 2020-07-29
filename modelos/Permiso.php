<?php 
//Incluímos inicialmente la conexión a la base de datos

require_once '../config/Conexion.php';

Class Permiso
{
			
	 public function __construct()
	{

	}


	 //Implementamos un método para insertar registros
	 
	 public function insertar ($nombre)
	 {	 
		 
		 $sql="INSERT INTO permiso (nombre)
		 VALUES ('$nombre')";
		 return Conexion::ejecutarConsulta($sql);
	 }

	//Implementamos un método para editar registros

	public function editar($idpermiso,$nombre)
	{
		$sql="UPDATE permiso SET nombre='$nombre' WHERE idpermiso='$idpermiso'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idpermiso)
	{
		$sql="SELECT * FROM permiso WHERE idpermiso='$idpermiso'";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	
	public function listar()
	{
		$sql="SELECT * FROM permiso";
		return Conexion::ejecutarConsulta($sql);				
	}


 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		/*$data = trim($data);

		$data = stripslashes($data);
		$data = htmlspecialchars($data);*/
		return $data;
	  }
	


	
}

?>