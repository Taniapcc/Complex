<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once '../config/Conexion.php';

Class Producto
{
		 
	 public function __construct()
	{

	}

	 //Implementamos un método para insertar registros
	 
	 public function insertar($idcategoria,$codigo,$nombre,$descripcion,$imagen,$precio,$idpresentacion,$idmedida,$stock,$idtienda)
	 						  
	 {	 
		 
		 $sql="INSERT INTO producto (idcategoria,codigo,nombre,descripcion,imagen,condicion,precio,idpresentacion,idmedida)
		 					VALUES ('$idcategoria','$codigo','$nombre','$descripcion','$imagen','1','$precio','$idpresentacion','$idmedida')";
		
		 $idproductonew=Conexion::ejecutarConsulta_retornarID($sql);
				 
		 $sqlb = "INSERT INTO bodega(idproducto,idtienda,stock)
				  values ('$idproductonew','$idtienda','$stock')";
				  
				 $sw = true; 
				 Conexion::ejecutarConsulta($sqlb) or $sw = false;		  

		 return $sw;
	 }

	//Implementamos un método para editar registros
	public function editar($idproducto,$idcategoria,$codigo,$nombre,$descripcion,$imagen,$precio,$idpresentacion,$idmedida)
	{
		$sql="UPDATE producto SET idcategoria='$idcategoria',codigo='$codigo',
		nombre='$nombre',descripcion='$descripcion',imagen='$imagen', 
		precio ='$precio', idpresentacion ='$idpresentacion', idmedida = '$idmedida'
		 WHERE idproducto='$idproducto'";
		return Conexion::ejecutarConsulta($sql);
	}
	
	//Implementamos un método para desactivar categorías
	
	public function desactivar($idproducto)
	{   
		$sql="UPDATE producto SET condicion='0' WHERE idproducto='$idproducto'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método para activar categorías
	

	public function activar($idproducto)
	{
		$sql="UPDATE producto SET condicion='1' WHERE idproducto='$idproducto'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idproducto)
	{
		$sql="SELECT * FROM producto WHERE idproducto='$idproducto'";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	public function listar($lcategoria)
	{		
		$sql="SELECT a.idproducto,a.idcategoria,
		c.nombre as categoria,a.codigo,a.nombre,a.descripcion,
		a.imagen,a.condicion,a.precio,b.stock,b.idcatalogo
		FROM producto a 
		left JOIN categoria c ON a.idcategoria=c.idcategoria
		left join bodega b on a.idproducto = b.idproducto		
		WHERE a.idcategoria = '$lcategoria'
		";
		return Conexion::ejecutarConsulta($sql);				
	}

	
//Implementar un método para listar los registros activos
public function listarActivos()
{
	$sql="SELECT a.idproducto,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM producto a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return Conexion::ejecutarConsulta($sql);		
}

//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
public function listarActivosVenta()
{
	$sql="SELECT a.idproducto,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idproducto=a.idproducto order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion 
	FROM producto a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return Conexion::ejecutarConsulta($sql);		
}

 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
}

?>