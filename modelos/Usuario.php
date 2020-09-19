<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once '../config/Conexion.php';

Class Usuario
{
	 
	 public function __construct()
	{

	}

	 //Implementamos un método para insertar registros
	 
	 public function insertar($idtienda,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$tipousuario,$permisos)
	 {	 
		$sql="INSERT INTO usuario (idtienda,nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,tipo_usuario,condicion)
		VALUES ('$idtienda','$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','$tipousuario','1')";		 
		//return Conexion::ejecutarConsulta($sql);
		
		$idusuarionew=Conexion::ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			Conexion::ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

	 }

	//Implementamos un método para editar registros
	public function editar($idusuario,$idtienda,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		
		$sql="UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',
		num_documento='$num_documento',direccion='$direccion',
		telefono='$telefono',email='$email',cargo='$cargo',login='$login',
		clave='$clave',imagen='$imagen', idtienda = '$idtienda' WHERE idusuario='$idusuario'";
		Conexion::ejecutarConsulta($sql);

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		Conexion::ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			Conexion::ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}


		return $sw;
		
	}
	
	//Implementamos un método para desactivar categorías
	
	public function desactivar($idusuario)
	{   
		$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
		return Conexion::ejecutarConsulta($sql);		
	}

	//Implementamos un método para activar categorías
	

	public function activar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
		return Conexion::ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return Conexion::ejecutarConsultaSimpleFila($sql);
	}
	
	//Implementar un método para listar los registros empleados
	
	public function listar()
	{		
		
		$sql = "SELECT a.*,b.nombre as tienda FROM usuario a
				INNER JOIN tienda b on a.idtienda = b.idtienda
				WHERE trim(tipo_usuario) = 'EMPLEADO'";
			return Conexion::ejecutarConsulta($sql);			
	}


	//Implementar un método para listar los registros clientes
	
	public function listarc()
	{		
		$sql = "SELECT a.*,b.nombre as tienda FROM usuario a
				INNER JOIN tienda b on a.idtienda = b.idtienda
				WHERE tipo_usuario = 'CLIENTE'";
		return Conexion::ejecutarConsulta($sql);			
	}

	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return Conexion::ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
		$login = Conexion::limpiarCadena($login);
		$clave = Conexion::limpiarCadena($clave);
		//$sql="SELECT a.idusuario,a.idtienda,a.nombre,a.tipo_documento,a.num_documento,a.telefono,a.email,a.cargo,a.imagen,a.login FROM usuario a WHERE a.login='$login' AND a.clave='$clave' AND a.condicion='1'";
		$sql="SELECT a.idusuario,a.idtienda,a.nombre,a.tipo_documento,
		a.num_documento,a.telefono,a.email,a.cargo,a.imagen,a.login, b.nombre as tienda
	    FROM usuario a 
		inner join tienda b on a.idtienda = b.idtienda
		WHERE a.login='$login' AND a.clave='$clave' AND a.condicion='1'";
		//$sql="SELECT a.*, b.nombre as tienda FROM usuario a  inner join tienda b on a.idtienda = b.idtienda WHERE a.login='$login' AND a.clave='$clave' AND condicion='1'"; 
		return Conexion::ejecutarConsultaSimpleFila($sql);  
	}

	public function buscar($login,$clave){
		$sql= "SELECT count(idusuario) as id FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'"; 
		$rspta= Conexion::ejecutarConsulta($sql);
		$reg = $rspta->fetch(PDO::FETCH_OBJ);
		$id = $reg-> id;
		return $id;	
	}


	
 	public   function limpiarCadena($data) {
		$data = Conexion::limpiarCadena($data);
		return $data;
	  }
	



	
}

?>