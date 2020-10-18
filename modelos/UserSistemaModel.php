<?php
    class UserSistemaModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

         function infoCorreo($email)
       {
           $sql="SELECT * FROM usuario where email = '$email'";
           $request = $this->select($sql);
           return $request;
       }

       function validaCorreo($email){
        $sql = "SELECT * FROM usuario WHERE email= '$email'";          
        $rows = $this->queryRows($sql);                  
        return ($rows>0)?true:false;
     }

     //Implementar un método para listar los registros
	 function listar()
     {
         $sql="SELECT * FROM usuario WHERE tipousuario = 'Empleado'";
         $request = $this->select_all($sql);
         return $request;					
     }



       
    }
?>