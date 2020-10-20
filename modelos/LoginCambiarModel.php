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

       function cambiarClave($id, $clave)
       {
           $r= false;

           if ($this->validar($id) != 0) {
               $claveNueva = hash_hmac("sha512", $clave, "clavesecreta");
               $sql = "UPDATE  usuario
                SET clave = '$claveNueva'
             where idusuario = '$id'";
               $resul =$this->queryNoSelect($sql);
               $r = true;
           }
           return $r;
       }
            

       


        }
        


        







    

?>
