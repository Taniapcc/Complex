<?php
session_start();
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

$idusuario=isset($_POST["idusuario"])? $usuario->limpiarCadena($_POST["idusuario"]):"";
$idtienda=isset($_POST["idtienda"])? $usuario->limpiarCadena($_POST["idtienda"]):"";
$nombre=isset($_POST["nombre"])? $usuario->limpiarCadena($_POST["nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])?$usuario-> limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? $usuario-> limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? $usuario->limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? $usuario->limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? $usuario->limpiarCadena($_POST["email"]):"";
$cargo=isset($_POST["cargo"])? $usuario->limpiarCadena($_POST["cargo"]):"";
$login=isset($_POST["login"])? $usuario->limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? $usuario->limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? $usuario->limpiarCadena($_POST["imagen"]):"";
$tipousuario=isset($_POST["tipousuario"])? $usuario->limpiarCadena($_POST["tipousuario"]):"";

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen=$_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
            }
        }
         //Hash SHA256 en la contraseña     
        $clavehash=hash("SHA256", $clave);
        if (empty($idusuario)) {
            $rspta=$usuario->insertar($idtienda, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clavehash, $imagen,$tipousuario,$_POST['permiso']);
            echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
        } else {
            // preguntar 

            $rspta=$usuario->editar($idusuario, $idtienda, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clavehash, $imagen, $_POST['permiso']);
            echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
        }
    
    break;

    case 'desactivar':
        $rspta=$usuario->desactivar($idusuario);
        echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
    break;

    case 'activar':
        $rspta=$usuario->activar($idusuario);
        echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
    break;

    case 'mostrar':
        $rspta=$usuario->mostrar($idusuario);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta=$usuario->listar();
        //Vamos a declarar un array
        $data= array();

        while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->tienda,
                "2"=>$reg->nombre,
                "3"=>$reg->tipo_documento,
                "4"=>$reg->num_documento,
                "5"=>$reg->telefono,
                "6"=>$reg->email,
                "7"=>$reg->login,
                "8"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
                "9"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

    case 'listarc':
        $rspta=$usuario->listarc();
        //Vamos a declarar un array
        $data= array();

        while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->tienda,
                "2"=>$reg->nombre,
                "3"=>$reg->tipo_documento,
                "4"=>$reg->num_documento,
                "5"=>$reg->telefono,
                "6"=>$reg->email,
                "7"=>$reg->login,
                "8"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
                "9"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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



    case 'permisos':
        //Obtenemos todos los permisos de la tabla permisos
        require_once "../modelos/Permiso.php";
        $permiso = new Permiso();
        $rspta = $permiso->listar();
    
        //Obtener los permisos asignados al usuario
        $id=$_GET['id'];

        $marcados = $usuario->listarmarcados($id);
        //Declaramos el array para almacenar todos los permisos marcados
        $valores=array();

        //Almacenar los permisos asignados al usuario en el array
            
        while ($per = $marcados->fetch(PDO::FETCH_OBJ)) {
            array_push($valores, $per->idpermiso);
        }

        //Mostramos la lista de permisos en la vista y si están o no marcados
        while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
            $sw=in_array($reg->idpermiso, $valores)?'checked':'';
            echo '<li> <input type="checkbox"'.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.' </li>';
        }
    break;

    case 'selectTienda':
        require_once "../modelos/Tienda.php";
        $tienda = new Tienda();
        $rspta = $tienda->select();
        while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
            echo '<option value=' . $reg->idtienda . '>' . $reg->nombre .'</option>';
        }
        

    break;

    case 'verificar':
        $logina=isset($_POST["logina"])? $usuario->limpiarCadena($_POST["logina"]):"";
        $clavea=isset($_POST["clavea"])? $usuario->limpiarCadena($_POST["clavea"]):"";

        //Encripto clave ingresada
        $clavehash = hash("SHA256", $clavea);
    
        $fetch = $usuario->verificar($logina, $clavehash);

        if (is_object($fetch)) {
            
           // session_start();
            //Declar variables de sesion
            $_SESSION['idusuario'] = $fetch->idusuario;
            $_SESSION['idtienda'] = $fetch->idtienda;
            $_SESSION['nombre'] = $fetch->nombre;
            $_SESSION['tipo_documento'] = $fetch->tipo_documento;
            $_SESSION['num_documento'] = $fetch->num_documento;
            $_SESSION['direccion'] = $fetch->direccion;
            $_SESSION['telefono'] = $fetch->telefono;
            $_SESSION['email'] = $fetch->email;
            $_SESSION['cargo'] = $fetch->cargo;
            $_SESSION['login'] = $fetch->login;
            $_SESSION['imagen'] = $fetch->imagen;
            $_SESSION['tienda'] = $fetch->tienda;

            //Obtenemos los permisos del usuario
            $marcados = $usuario->listarmarcados($fetch->idusuario);
            //Declaramos el array para almacenar todos los permisos marcados
            $valores=array();

            //Almacenamos los permisos marcados en el array
            while ($per = $marcados->fetch(PDO::FETCH_OBJ)) {
                array_push($valores, $per->idpermiso);
            }

            //Determinamos los accesos del usuario
            in_array(1, $valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
            in_array(2, $valores)?$_SESSION['admin']=1:$_SESSION['admin']=0;
            in_array(3, $valores)?$_SESSION['administrador']=1:$_SESSION['administrador']=0;
            in_array(4, $valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
            in_array(5, $valores)?$_SESSION['repartidor']=1:$_SESSION['repartidor']=0;
            in_array(6, $valores)?$_SESSION['pedidos']=1:$_SESSION['pedidos']=0;
            in_array(7, $valores)?$_SESSION['consultap']=1:$_SESSION['consultap']=0;
            in_array(9, $valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;

            echo json_encode($fetch);
        } else {
            $vacio= null;
            echo json_encode($vacio);
        }
        

    break;

    case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;


    
    
}
