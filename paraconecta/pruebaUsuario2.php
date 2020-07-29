<?php
 

 //require_once '../ParaConectar/Categoria.php';
 require_once '../modelos/Usuario.php';
 $usuario= new Usuario();

/* $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,
 0 as precio_venta,
  a.descripcion,a.imagen,a.condicion 
  FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
*/
$idusuario = 1;
$nombre = "Tania";
$tipo_documento= "CEDULA";
$num_documento= "1771";
$direccion = "CALLE";
$telefono= "23242";
$email = "tania@gmail.com";
$cargo= "nose";
$logina = "juancho";
$clavea = "p.1234";
$imagen = null;
$permisos = "1";


$clavehash=hash("SHA256",$clavea);

//echo "clave ". $clavehash;
echo "<br>";

		$row= $usuario->verificar($logina, $clavehash);
     // $fetch =$rspta->fetch(PDO::FETCH_OBJ);
    
      //$rspta=$categoria->listar();
      //Vamos a declarar un array
     // $existe = 0;
      //$fetch = $rspta->fetch(PDO::FETCH_OBJ);
               
    // while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
   
      

      if(is_object($row)){
      
        echo "existe"."<br>";
        echo $row->idusuario;
        echo $row->login;

      } else {
        echo "no existe";
      }



    /*  while($row = $rpsta->fetch(PDO::FETCH_OBJ)){
        echo "Nombre: " . $row->login . "<br>";
        echo "Ciudad: " . $row->nombre . "<br>";
      }
  */

  echo '<pre>';
  
  $a = json_encode($row);
  var_dump( $a);
  
  echo '</pre>';

  


		
        //if (isset($fetch) == TRUE) {
      /* if (isset($fetch) == True) {
            //Declaramos las variables de sesión
             echo "encontro";

        } else {
            echo "NO ENCONTRE";
        }*/


 //$rspta=$usuario->editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos);



?>