<?php
    class AdmonModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        function infoCorreo($email)
        {
           $sql="SELECT * FROM usuario WHERE tipousuario = 'Empleado' AND email = '$email'  ";
           $request = $this->select($sql);
           return $request;
        }

       function validaCorreo($email){
        $sql = "SELECT * FROM usuario WHERE tipousuario = 'Empleado' AND email= '$email'";          
        $rows = $this->queryRows($sql);                  
        return ($rows>0)?true:false;
         }
       
    }
?>