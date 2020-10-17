<?php
    class loginModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
      
     //Implementamos un método para insertar registros

     function validaCorreo($email){
        $sql = "SELECT * FROM usuario WHERE email= '$email'";          
        $rows = $this->queryRows($sql);          
        return ($rows>0)?true:false;
      }

      public function listar(){
           $sql = "SELECT * FROM usuario";
           $resul = $this->select_all($sql);
           return $resul; 
      }

      public function mostrar($id){
        $sql = "SELECT * FROM usuario WHERE email='".$id."'";
        dep($sql);
        $resul = $this->select($sql);
        return $resul; 
   }

   public funcTion ingresarLogin($email,$password){



   }



     
     





     
    }
?>
