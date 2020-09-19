<?php 
//Incluímos inicialmente la conexión a la base de datos
//session_start();


require_once '../config/Conexion.php';


Class Venta
{
	
	 //Implementamos un método para insertar registros
	 
	 public function insertar ($nombre,$descripcion)
	 {	 
		 
		 $sql="INSERT INTO venta (nombre,descripcion,condicion)
		 VALUES ('$nombre','$descripcion','1')";
		 return Conexion::ejecutarConsulta($sql);
	 }

	//Implementamos un método para editar registros

	public function editar($idventa,$nombre,$descripcion)
	{
		$sql="UPDATE venta SET nombre='$nombre',descripcion='$descripcion' WHERE idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	
	public function desactivar($idventa)
	{   
		$sql="UPDATE venta SET condicion='0' WHERE idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método para activar categorías
	

	public function activar($idventa)
	{
		$sql="UPDATE venta SET condicion='1' WHERE idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idventa)
	{
		$sql="SELECT * FROM venta WHERE idventa='$idventa'";
		//$sql= "CALL spMostrarVenta ('$idventa')";
		return  Conexion::ejecutarConsultaSimpleFila($sql);

	}
	
	//Implementar un método para listar los registros
	
	
	public function listarRe()
	{
		$sql="SELECT idventa,fecha_hora,num_comprobante,estado,fechaEntrega FROM venta";
		return Conexion::ejecutarConsulta($sql);				
	}

//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		
		
		$sql="SELECT * FROM venta where condicion = 1";
		return Conexion::ejecutarConsulta($sql);		
	}
	

	public function listar()
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,
		v.idcliente,p.nombre as cliente,u.idusuario,
		u.nombre as usuario, r.nombre as repartidor,
		v.tipo_comprobante,
		v.serie_comprobante,v.num_comprobante,
		v.total_venta,v.impuesto,v.estado 
		FROM venta v 
		INNER JOIN usuario p ON v.idcliente=p.idusuario 
		INNER JOIN usuario u ON v.idusuario=u.idusuario
		LEFT JOIN usuario r ON v.idrepartidor=r.idusuario
		WHERE v.estado in('Aceptado','Entregado') 
		ORDER by v.idventa desc";
		return Conexion::ejecutarConsulta($sql);		
	}


		public function entregar($idventa,$idrepartidor)
	{
		date_default_timezone_set('America/Lima');
		$fecha = date("Y-m-d H:i:s");
				
		$sql="UPDATE venta SET estado='Entregado',
		fechaEntrega= '$fecha',idrepartidor = '$idrepartidor'
		 WHERE idventa='$idventa'";
	
		return Conexion::ejecutarConsulta($sql);
	}


	
 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	


	
}

?>