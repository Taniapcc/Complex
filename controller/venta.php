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
require_once "../modelos/Venta.php";

$venta=new Venta();
$idusuario = $_SESSION["idusuario"];
$ltienda = $_SESSION["idtienda"];
$idventa=isset($_POST["idventa"])? $venta->limpiarCadena($_POST["idventa"]):"";
$idcliente=isset($_POST["idcliente"])? $venta->limpiarCadena($_POST["idcliente"]):"";
$tipo_comprobante=isset($_POST["tipo_comprobante"])? $venta->limpiarCadena($_POST["tipo_comprobante"]):"";
$serie_comprobante=isset($_POST["serie_comprobante"])? $venta->limpiarCadena($_POST["serie_comprobante"]):"";
$num_comprobante=isset($_POST["num_comprobante"])? $venta->limpiarCadena($_POST["num_comprobante"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? $venta->limpiarCadena($_POST["fecha_hora"]):"";
$impuesto=isset($_POST["impuesto"])? $venta->limpiarCadena($_POST["impuesto"]):"";
$total_venta=isset($_POST["total_venta"])? $venta->limpiarCadena($_POST["total_venta"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idventa)){
			$rspta=$venta->insertar($ltienda,$idcliente,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_venta,$_POST["idproducto"],$_POST["cantidad"],$_POST["precio_venta"],$_POST["descuento"]);
			echo $rspta ? "Venta registrada" : "No se pudieron registrar todos los datos de la venta";
		}
		
	break;

	case 'anular':
		$rspta=$venta->anular($idventa);
 		echo $rspta ? "Venta anulada" : "Venta no se puede anular";
	break;

	case 'mostrar':
		$rspta=$venta->mostrar($idventa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $venta->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch(PDO::FETCH_OBJ))
				{
					echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->descuento.'</td><td>'.$reg->subtotal.'</td></tr>';
					$total=$total+($reg->precio_venta*$reg->cantidad-$reg->descuento);
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>';
	break;

	case 'listar':
		$rspta=$venta->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch(PDO::FETCH_OBJ)){
 			if($reg->tipo_comprobante=='Ticket'){
 				$url='../reportes/exTicket.php?id=';
 			}
 			else{
 				$url='../reportes/exFactura.php?id=';
 			}

 			$data[]=array(
 				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>').
 					'<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>',
 				"1"=>$reg->fecha,
 				"2"=>$reg->cliente,
 				"3"=>$reg->usuario,
 				"4"=>$reg->tipo_comprobante,
 				"5"=>$reg->serie_comprobante.'-'.$reg->num_comprobante,
 				"6"=>$reg->total_venta,
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

	case 'selectCliente':
		require_once "../modelos/Cliente.php";
		$cliente = new Cliente();

		$rspta = $cliente->listarcv();

		while ($reg = $rspta->fetch(PDO::FETCH_OBJ))
				{
				echo '<option value=' . $reg->idcliente . '>' . $reg->nombre . '</option>';
				}
	break;

	case 'listarProductosVenta':
		require_once "../modelos/Producto.php";
		$ltienda = $_SESSION["idtienda"];
		$producto=new Producto();

		$rspta=$producto->listarActivosVenta($ltienda);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch(PDO::FETCH_OBJ)){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idproducto.',\''.$reg->nombre.'\',\''.$reg->precio_venta.'\')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->categoria,
 				"3"=>$reg->codigo,
 				"4"=>$reg->stock,
 				"5"=>$reg->precio_venta,
 				"6"=>"<img src='../files/productos/".$reg->imagen."' height='50px' width='50px' >"
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