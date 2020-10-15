<?php
    class LoginCambiarModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        function mostrar($id)
       {
           $sql="SELECT * FROM usuario where idusuario = '$id'";
           $request = $this->select($sql);
           return $request;
       }

       function validar($id){
        $sql = "SELECT * FROM usuario WHERE idusuario= '$id' ";
        $rows = $this->queryRows($sql);          
        return $rows;
      }

      function actualizar($id,$clave){
        $sql ="UPDATE usuario SET clave = '$clave' WHERE idusuario = '$id'";
        $rows = $this-> queryNoSelect($sql);          
        return $rows;
      }


       function cambiarClave($id, $clave)
       {
            $r= false;
            $claveNueva = hash_hmac("sha512", $clave, "clavesecreta");
            $r =$this->actualizar($claveNueva,$id);

            return $r;

        }
        


        
      }






    

?>
