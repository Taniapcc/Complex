<?php
    class loginModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      
     //Implementamos  metodo para validar si existe regitro del
     //usuario
     public function infoCorreo($email)
     {
         $sql="SELECT nombre,email,idusuario FROM usuario where email = '$email' AND tipousuario = 'Anonimo'  AND condicion = 1";
         $arrData = array($email);
         $request = $this->select($sql,$arrData);
         return $request;
     }

     function validaCorreo($email){
        $sql = "SELECT nombre,email,idusuario FROM usuario WHERE email= '$email' AND tipousuario = 'Anonimo'  AND condicion = 1 ";
           
        $rows = $this->queryRows($sql);                  
        return ($rows>0)?true:false;
      }

      function listar(){
           $sql = "SELECT * FROM usuario WHERE  tipousuario = 'Anonimo' AND condicion = 1";
           $resul = $this->select_all($sql);
           return $resul; 
      }


      

 
   


     





     
    }
?>
