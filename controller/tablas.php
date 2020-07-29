<?php 

require_once "../modelos/Tablas.php";
$tab_name = "Tablas";

$tablas=new Tablas();

$idauxiliares=isset($_POST["idauxiliares"])?$tablas->limpiarCadena($_POST["idauxiliares"]):"";
$idtabla=isset($_POST["idtabla"])?$tablas->limpiarCadena($_POST["idtabla"]):"";
$idsubtabla=isset($_POST["idsubtabla"])?$tablas->limpiarCadena($_POST["idsubtabla"]):"";
$nombre=isset($_POST["nombre"])?$tablas->limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])?$tablas->limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idauxiliares)){
			$rspta=$tablas->insertar($idtabla,$nombre,$descripcion);
			echo $rspta ? $tab_name. " registrada" : $tab_name." no se pudo registrar";
		}
		else {
			$rspta=$tablas->editar($idauxiliares,$idtabla,$idsubtabla,$nombre,$descripcion);
			echo $rspta ? $tab_name. " actualizada" : $tab_name. " no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$tablas->desactivar($idauxiliares);
 		echo $rspta ? $tab_name. " Desactivada" : $tab_name. " no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$tablas->activar($idauxiliares);
 		echo $rspta ? $tab_name. " activada" : $tab_name. " no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$tablas->mostrar($idauxiliares);
		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	//case 'listar':
	default:
	$ltabla = $_REQUEST["ltabla"]; // nuevo para filtrar
	$rspta=$tablas->listar($ltabla);

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

case 'selectTabla':
	$rspta = $tablas->selectTabla();
	while($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
		echo '<option value=' . $reg->idtabla . '>' . $reg->nombre .'</option>';
		
	  } 
break;

}
?>