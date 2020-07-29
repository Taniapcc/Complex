<?php
   
          require_once '../modelos/Producto.php';
          $idtabla=7;
       //  $sql = " SELECT MAX(idsubtabla) as Id FROM auxiliares WHERE auxiliares.idtabla = '$idtabla'";
       
       $producto=new Producto();
       
       $rspta = $producto ->Listar();   
       
       
 while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
        
           $a= $reg->nombre;
           
                     echo $a;

       } 
     
           


    
?>