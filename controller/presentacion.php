<?php 

require_once "../modelos/Presentacion.php";
$tab_name = "Presentacion";

$presentacion=new Presentacion();

$idauxiliares=isset($_POST["idauxiliares"])?$presentacion->limpiarCadena($_POST["idauxiliares"]):"";
$idtabla=isset($_POST["idtabla"])?$presentacion->limpiarCadena($_POST["idtabla"]):"";
$idsubtabla=isset($_POST["idsubtabla"])?$presentacion->limpiarCadena($_POST["idsubtabla"]):"";
$nombre=isset($_POST["nombre"])?$presentacion->limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])?$presentacion->limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idauxiliares)){
			$rspta=$presentacion->insertar($nombre,$descripcion);
			echo $rspta ? $tab_name. " registrada" : $tab_name." no se pudo registrar";
		}
		else {
			$rspta=$presentacion->editar($idauxiliares,$idtabla,$idsubtabla,$nombre,$descripcion);
			echo $rspta ? $tab_name. " actualizada" : $tab_name. " no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$presentacion->desactivar($idauxiliares);
 		echo $rspta ? $tab_name. " Desactivada" : $tab_name. " no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$presentacion->activar($idauxiliares);
 		echo $rspta ? $tab_name. " activada" : $tab_name. " no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$presentacion->mostrar($idauxiliares);
		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	//case 'listar':
	default:
	$rspta=$presentacion->listar();
	//Vamos a declarar un array
	$data= Array();
		   
	while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
		$data[]=array(
			"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idauxiliares.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger" onclick="desactivar('.$reg->idauxiliares.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idauxiliares.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary" onclick="activar('.$reg->idauxiliares.')"><i class="fa fa-check"></i></button>',
			"1"=>$reg->nombre,
			"2"=>$reg->descripcion,
			"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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