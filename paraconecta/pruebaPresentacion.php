<?php
 

 //require_once '../ParaConectar/Categoria.php';
 require_once "../modelos/Presentacion.php";
 $presentacion = new Presentacion();
 $rspta = $presentacion->select();
 while($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
     echo '<option value=' . $reg->idpresentacion . '>' . $reg->nombre .'</option>';
     

     
   } 


 

  echo '<pre>';
  
  
  var_dump( $rspta);
  
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