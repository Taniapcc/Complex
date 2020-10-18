<?php 
//Incluímos inicialmente la conexión a la base de datos
//session_start();


require_once '../config/Conexion.php';
define("TABLA", "categoria");

Class Categoria
{
	private $idCategoria;
	private $nombre;
	private $descripcion;
	
	public function getIdCategoria() {
		return $this->idCategoria;
	 }
	 public function getNombre() {
		return $this->nombre;
	 }
	 public function getDescripcion() {
		return $this->descripcion;
	 }

	 public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	 }
	 public function setNombre($nombre) {
		$this->nombre = $nombre;
	 }

	 public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	 }

	 public function __construct()
	{

	}
	 //Implementamos un método para insertar registros
	 
	 public function insertar ($nombre,$descripcion)
	 {	 
		 
		 $sql="INSERT INTO categoria (nombre,descripcion,condicion)
		 VALUES ('$nombre','$descripcion','1')";
		 return Conexion::ejecutarConsulta($sql);
	 }

	//Implementamos un método para editar registros

	public function editar($idcategoria,$nombre,$descripcion)
	{
		$sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	
	public function desactivar($idcategoria)
	{   
		$sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método para activar categorías
	

	public function activar($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
		//$sql= "CALL spMostrarCategoria ('$idcategoria')";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	
	public function listar()
	{
		$sql="SELECT * FROM categoria";
		return Conexion::ejecutarConsulta($sql);				
	}

//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria where condicion = 1";
		return Conexion::ejecutarConsulta($sql);		
	}
	
	
 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	


	
}

?>