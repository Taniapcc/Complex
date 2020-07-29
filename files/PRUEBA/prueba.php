<?php
   
          require_once '../config/Conexion.php';
          $idtabla=7;
       //  $sql = " SELECT MAX(idsubtabla) as Id FROM auxiliares WHERE auxiliares.idtabla = '$idtabla'";
       $sql = "SELECT max(idsubtabla) as id FROM auxiliares WHERE idtabla = '$idtabla'" ;    
       $rspta = Conexion::ejecutarConsulta($sql);
       
 while($reg = $rspta->fetch(PDO::FETCH_OBJ)){
        
           $a= $reg->id;
           
           $a= $a+1;

           echo $a;

       } 
     
           


    
?>