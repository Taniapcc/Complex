<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Bodega
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($tipo_bodega,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email)
	{
		$sql="INSERT INTO bodega (tipo_bodega,nombre,tipo_documento,num_documento,direccion,telefono,email)
		VALUES ('$tipo_bodega','$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email')";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idbodega,$tipo_bodega,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email)
	{
		$sql="UPDATE bodega SET tipo_bodega='$tipo_bodega',nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email' WHERE idbodega='$idbodega'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar categorías
	public function eliminar($idbodega)
	{
		$sql="DELETE FROM bodega WHERE idbodega='$idbodega'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcatalogo)
	{
		//$idtienda = $_SESSION['idtienda'] ;	

		$sql="SELECT a.*,
		b.idcatalogo as idbodega
		b.stock, c.nombre as tienda, 
		f.nombre as categoria,
		d.nombre as presentacion, 
		e.nombre as medida 
		FROM producto a 
		left join bodega b on a.idproducto = b.idproducto
		left join tienda c on b.idtienda = c.idtienda
		left join auxiliares d on a.idpresentacion = d.idauxiliares
		left join auxiliares e on a.idmedida = d.idauxiliares
		left join categoria f on a.idcategoria = f.idcategoria
		where b.idtienda =  '$idtienda' 
		and  b.idcatalogo = '$idcatalogo'";

		return Conexion::ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
		{
		//$idtienda = $_SESSION['idtienda'] ;	
		$idtienda = 1;	
		$sql="SELECT a.*,
		b.idcatalogo as idbodega,
		b.stock, c.nombre as tienda, 
		f.nombre as categoria, 
		d.nombre as presentacion, 
		e.nombre as medida 
		FROM producto a 
		inner join bodega b on a.idproducto = b.idproducto
		inner join tienda c on b.idtienda = c.idtienda
		inner join auxiliares d on a.idpresentacion = d.idauxiliares
		inner join auxiliares e on a.idmedida = e.idauxiliares
		inner join categoria f on a.idcategoria= f.idcategoria";
		return Conexion::ejecutarConsulta($sql);		
	}

	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	
}

?>