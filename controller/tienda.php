<?php 
require_once "../modelos/Tienda.php";

$tienda=new Tienda();

$idtienda=isset($_POST["idtienda"])? $tienda->limpiarCadena($_POST["idtienda"]):"";
$nombre=isset($_POST["nombre"])? $tienda->limpiarCadena($_POST["nombre"]):"";
$provincia=isset($_POST["provincia"])? $tienda->limpiarCadena($_POST["provincia"]):"";
$ciudad=isset($_POST["ciudad"])? $tienda->limpiarCadena($_POST["ciudad"]):"";
$direccion=isset($_POST["direccion"])? $tienda->limpiarCadena($_POST["direccion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idtienda)){
			$rspta=$tienda->insertar($nombre,$provincia,$ciudad,$direccion);
			echo $rspta ? "Tienda registrada" : "Tienda no se pudo registrar";
		}
		else {
			$rspta=$tienda->editar($idtienda,$nombre,$provincia,$ciudad,$direccion);
			echo $rspta ? "Tienda actualizada" : "Tienda no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$tienda->desactivar($idtienda);
 		echo $rspta ? "Tienda Desactivada" : "Tienda no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$tienda->activar($idtienda);
 		echo $rspta ? "Tienda activada" : "Tienda no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$tienda->mostrar($idtienda);
		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	//case 'listar':
	default:
		$rspta=$tienda->listar();
 		//Vamos a declarar un array
		 $data= Array();
				
 		while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idtienda.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idtienda.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idtienda.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idtienda.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
				 "2"=>$reg->provincia,
				 "3"=>$reg->ciudad,
				 "4"=>$reg->direccion,
 				"5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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
?>