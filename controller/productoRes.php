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
			if ($_SESSION['ventas']==1)
		{


require_once "../modelos/Producto.php";

$producto=new Producto();
$idproducto=isset($_POST["idproducto"])? $producto->limpiarCadena($_POST["idproducto"]):"";
$idcategoria=isset($_POST["idcategoria"])? $producto->limpiarCadena($_POST["idcategoria"]):"";
$codigo=isset($_POST["codigo"])? $producto->limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? $producto->limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? $producto->limpiarCadena($_POST["descripcion"]):"";
$imagen=isset($_POST["imagen"])? $producto->limpiarCadena($_POST["imagen"]):"";
$precio=isset($_POST["precio"])? $producto->limpiarCadena($_POST["precio"]):"";
$idpresentacion=isset($_POST["idpresentacion"])? $producto->limpiarCadena($_POST["idpresentacion"]):"";
$idmedida=isset($_POST["idmedida"])? $producto->limpiarCadena($_POST["idmedida"]):"";
$stock=isset($_POST["stock"])? $producto->limpiarCadena($_POST["stock"]):"";
$idtienda = $_SESSION['idtienda'];

switch ($_GET["op"])
{
	case 'guardaryeditar':
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/productos/" . $imagen);
			}
		}

		if (empty($idproducto)){
			$rspta=$producto->insertar($idcategoria,$codigo,$nombre,$descripcion,$imagen,$precio,$idpresentacion,$idmedida,$stock,$idtienda);
			echo $rspta ? "Producto registrada" : "Producto no se pudo registrar";
		}
		else {
			$rspta=$producto->editar($idproducto,$idcategoria,$codigo,$nombre,$descripcion,$imagen,$precio,$idpresentacion,$idmedida,$stock,$idtienda);
			
			echo $rspta ? "Producto actualizada" : "Producto no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$producto->desactivar($idproducto);
 		echo $rspta ? "Producto Desactivada" : "Producto no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$producto->activar($idproducto);
 		echo $rspta ? "Producto activada" : "Producto no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$producto->mostrar($idproducto);
		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
	//default:
		$lcategoria = $_REQUEST["lcategoria"]; // nuevo para filtrar
		$rspta=$producto->listarb($lcategoria,$_SESSION["idtienda"]);
 		//Vamos a declarar un array
		 $data= Array();
				
 		while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="desactivar('.$reg->idproducto.')"><i class="fa fa-check"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="activar('.$reg->idproducto.')"><i class="fa fa-close"></i></button>',
				"1"=>$reg->categoria,
				"2"=>$reg->nombre,
				"3"=>$reg->precio,
 				"4"=>$reg->codigo,
 				"5"=>"<img src='../files/productos/".$reg->imagen."' height='50px' width='50px' >",
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

	case 'selectCategoria':
		//require_once "../modelos/Categoria.php";
		require "../modelos/Categoria.php";
		$categoria = new Categoria();
		$rspta = $categoria->select();
		while($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
			echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre .'</option>';
			
		  } 
	break;
		  
	 case 'selectPresentacion':
			require_once "../modelos/Tablas.php";
			$tablas = new tablas();
			$idtabla = 1;
			$rspta = $tablas->selectp($idtabla);
			while($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
				echo '<option value=' . $reg->idauxiliares . '>' . $reg->nombre .'</option>';
				
			  } 	  
	 break;

	 case 'selectMedida':
		require_once "../modelos/Tablas.php";
		$tablas = new tablas();
		$idtabla = 2;
		$rspta = $tablas->selectp($idtabla);
		while($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
			echo '<option value=' . $reg->idauxiliares . '>' . $reg->nombre .'</option>';
			
		  } 	

	 
 	break;
}
//Fin de las validaciones de acceso
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();



?>