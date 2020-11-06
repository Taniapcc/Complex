<?php
    class AdmonModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        function infoCorreo($email)
        {
         
          $sql="SELECT * FROM v_empleado WHERE email = ?  ";
          $arrData = array($email);
           $request = $this->select($sql,$arrData);
           return $request;
        }

       function validaCorreo($data){

        $email = strClean($data['usuario']);
        $clave = $data['pass'];

        $clave = hash_hmac("sha512", $clave, llave()); 

        $sql = "SELECT email FROM v_empleado where email= '$email' and clave = '$clave'";         
        $rows = $this->queryRows($sql);                  
        return ($rows>0)?true:false;
         }
       
    }
?>