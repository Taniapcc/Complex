<?php 
//Incluímos inicialmente la conexión a la base de datos

require_once '../config/Conexion.php';
define("TB_NUM", 1);

Class Presentacion
{
	
	 public function __construct()
	{

	}
	 //Implementamos un método para insertar registros
	 
	 public function insertar ($nombre,$descripcion,$tabla)
	 {	 
		$idtabla = TB_NUM;

		$sql = "SELECT max(idsubtabla) as id FROM auxiliares WHERE idtabla = '$idtabla'" ;    
		$rspta = Conexion::ejecutarConsulta($sql);
		
  		while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
		 	$idsubtabla= $reg->id;
			$idsubtabla= $idsubtabla+1; 
 		} 

		//$sql = "CALL spInsertrarAuxiliar ('$idtabla', '$idsubtabla', '$nombre','$descripcion')";
		 $sql = " insert into auxiliares ( idtabla, idsubtabla, nombre, descripcion) VALUES ( '$idtabla', '$idsubtabla', '$nombre', '$descripcion')";

		return Conexion::ejecutarConsulta($sql);

	 }

	//Implementamos un método para editar registros

	public function editar($idauxiliares,$idtabla,$idsubtabla,$nombre,$descripcion)
	{
		$sql="UPDATE auxiliares SET nombre='$nombre',
		descripcion='$descripcion',
		idtabla = '$idtabla',
		idsubtabla = '$idsubtabla'
		 WHERE idauxiliares='$idauxiliares'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	
	public function desactivar($idauxiliares)
	{   
		$sql="UPDATE auxiliares SET condicion='0' WHERE idauxiliares='$idauxiliares'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método obtener max valor

	public function IDsubtabla(){
		$sql= "SELECT max(idsubtabla) as id FROM auxiliares WHERE idtabla = " .TB_NUM;
		$rspta= Conexion::ejecutarConsulta($sql);
		$reg = $rspta->fetch(PDO::FETCH_OBJ);
		$id = $reg-> id;
		return id+1;
	
	}

	//Implementamos un método para activar 
	public function activar($idauxiliares)
	{
		$sql="UPDATE auxiliares SET condicion='1' WHERE idauxiliares='$idauxiliares'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idauxiliares)
	{
		//$sql="SELECT * FROM auxiliares WHERE idauxiliares='$idauxiliares'";
		$sql= "CALL spMostrarAuxiliares ('$idauxiliares')";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	public function listar()
	
	{
		//$sql = "CALL spListarAuxiliares(".TB_NUM.")";
		$sql = "SELECT * from auxiliares where idtabla = ". TB_NUM . " AND idsubtabla <> 0";
		return Conexion::ejecutarConsulta($sql);				
	}

	//Implementar un método para listar los registros y mostrar en el select

	public function selectp($idtabla)
	{
		/*$sql= "SELECT idauxiliares AS idpresentacion , nombre FROM auxiliares WHERE idtabla = ". TB_NUM . " AND idsubtabla <> 0 AND condicion = 1";
		return Conexion::ejecutarConsulta($sql);	*/
		//$xtabla = TB_NUM;
		
		$sql="SELECT * FROM auxiliares
		 where 	idtabla = '$idtabla' and  idsubtabla <> 0 and condicion = 1";
		return Conexion::ejecutarConsulta($sql);	
	}
	
 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	
}

?>