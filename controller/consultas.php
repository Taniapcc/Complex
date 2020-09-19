<?php 

	ob_start();
	if (strlen(session_id()) < 1){
		session_start();//Validamos si existe o no la sesión
	}
		if (!isset($_SESSION["nombre"]))
		{
			header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['consultav']==1)
		{

require_once "../modelos/Consultas.php";
$consulta=new Consultas();

$fecha_inicio=isset($_POST["fecha_inicio"])? $consulta->limpiarCadena($_POST["fecha_inicio"]):"";
$fecha_fin=isset($_POST["fecha_fin"])? $consulta->limpiarCadena($_POST["fecha_fin"]):"";
$idcliente=isset($_POST["idcliente"])? $consulta->limpiarCadena($_POST["idcliente"]):"";


switch ($_GET["op"]){



	case 'ventasfechacliente':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];
		$idcliente=$_REQUEST["idcliente"];

		$rspta=$consulta->ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente);
 		//Vamos a declarar un array
 		$data= Array();
		 while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
 	
 			$data[]=array(
 				"0"=>$reg->fecha,
 				"1"=>$reg->usuario,
 				"2"=>$reg->cliente,
 				"3"=>$reg->tipo_comprobante,
 				"4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
 				"5"=>$reg->total_venta,
 				"6"=>$reg->impuesto,
 				"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();
?>