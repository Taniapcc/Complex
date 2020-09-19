<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Venta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idtienda,$idcliente,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_venta,$idproducto,$cantidad,$precio_venta,$descuento)

	{
		
		$tipo_comprobante = "Factura";
		$impuesto = 12;
			
		$sql="INSERT INTO venta (idtienda,idcliente,idusuario,tipo_comprobante,serie_comprobante,num_comprobante,fecha_hora,impuesto,total_venta,estado)
		                 VALUES ('$idtienda','$idcliente','$idusuario','$tipo_comprobante','$serie_comprobante','$num_comprobante','$fecha_hora','$impuesto','$total_venta','Aceptado')";
		
		$idventanew=Conexion::ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;
		// Graba el detalle

	/*	while ($num_elementos < count($idproducto))
		{
			$sql_detalle = "INSERT INTO detalle_venta(idventa, idproducto,cantidad,precio_venta) 
			VALUES ('$idventanew', '$idproducto[$num_elementos]','$cantidad[$num_elementos]',
			'$precio_venta[$num_elementos]')";
			Conexion::ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
*/		
		$tot_elem =  count($idproducto);
		for ($num_elementos = 0; $num_elementos < $tot_elem; $num_elementos++) {

			$sql_detalle = "INSERT INTO detalle_venta(idventa, idproducto,cantidad,precio_venta) 
			VALUES ('$idventanew', '$idproducto[$num_elementos]','$cantidad[$num_elementos]',
			'$precio_venta[$num_elementos]')";
			Conexion::ejecutarConsulta($sql_detalle) or $sw = false;
			
		  }


		return $sw;
	}

	
	//Implementamos un método para anular la venta
	public function anular($idventa)
	{
		$sql="UPDATE venta SET estado='Anulado' WHERE idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

		//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idventa)
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,
		p.nombre as cliente,u.idusuario,u.nombre as usuario,
		v.tipo_comprobante,v.serie_comprobante,
		v.num_comprobante,v.total_venta,
		v.impuesto,v.estado FROM venta v 
		INNER JOIN usuario p ON v.idcliente=p.idusuario 
		INNER JOIN usuario u ON v.idusuario=u.idusuario
		 WHERE v.idventa='$idventa'";
		return Conexion::ejecutarConsultaSimpleFila($sql);
	}

	public function listarDetalle($idventa)
	{
		$sql="SELECT dv.idventa,dv.idproducto,a.nombre,dv.cantidad,
				dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal 
				FROM detalle_venta dv 
				inner join producto a on dv.idproducto=a.idproducto
				inner join bodega b on b.idproducto = dv.idproducto
				where dv.idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,
		v.idcliente,p.nombre as cliente,u.idusuario,
		u.nombre as usuario,v.tipo_comprobante,
		v.serie_comprobante,v.num_comprobante,
		v.total_venta,v.impuesto,v.estado 
		FROM venta v 
		INNER JOIN usuario p ON v.idcliente=p.idusuario 
		INNER JOIN usuario u ON v.idusuario=u.idusuario 
		ORDER by v.idventa desc";
		return Conexion::ejecutarConsulta($sql);		
	}
/**
 * 		Funciones para la factura
 * 
 */

	public function ventacabecera($idventa){
		$sql="SELECT v.idventa,v.idcliente,
		p.nombre as cliente,
		p.direccion,p.tipo_documento,
		p.num_documento,p.email,
		p.telefono,v.idusuario,u.nombre as usuario,
		v.tipo_comprobante,v.serie_comprobante,
		v.num_comprobante,date(v.fecha_hora) as fecha,
		v.impuesto,v.total_venta 
		FROM venta v 
		INNER JOIN usuario p ON v.idcliente=p.idusuario 
		INNER JOIN usuario u ON v.idusuario=u.idusuario 
		WHERE v.idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

	public function ventadetalle($idventa){
		$sql="SELECT a.nombre as producto,
		a.codigo,d.cantidad,d.precio_venta,
		d.descuento,(d.cantidad*d.precio_venta-d.descuento) as subtotal 
		FROM detalle_venta d 
		INNER JOIN producto a ON d.idproducto=a.idproducto 
		WHERE d.idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}

	// Repatidor

	public function listarRe()
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,
				v.idcliente,p.nombre as cliente,u.idusuario,
				u.nombre as usuario, r.nombre as repartidor,
				v.tipo_comprobante,	v.serie_comprobante,
				v.num_comprobante,v.total_venta,
				v.impuesto,v.estado, v.fechaEntrega
				FROM venta v 
				INNER JOIN usuario p ON v.idcliente=p.idusuario 
				INNER JOIN usuario u ON v.idusuario=u.idusuario
				LEFT JOIN usuario r ON v.idrepartidor=r.idusuario
				WHERE v.estado in ('Aceptado','Entregado') 
				ORDER by v.idventa desc";
		return Conexion::ejecutarConsulta($sql);		
	}


	public function entregar($idventa)
	{
		date_default_timezone_set('America/Lima');
		$fecha = date("Y-m-d H:i:s");
		$idusuario = $_SESSION['idusuario'];
				
		$sql="UPDATE venta SET estado= 'Entregado',
		fechaEntrega= '$fecha',idrepartidor = '$idusuario'
		 WHERE idventa='$idventa'";
		return Conexion::ejecutarConsulta($sql);
	}


	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	
}
?>