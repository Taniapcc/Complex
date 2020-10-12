<?php
    class LoginRegistroModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function existeEmail($email){
            $sql = "SELECT * from usuario WHERE email = '$email'";
            $registro= $this->select_all($sql);
            return $registro;
            

        }

        
	//Implementar un método para listar los registros
	public function listar()
	{
        $sql="SELECT * FROM usuario";
        $request = $this->select_all($sql);
        return $request;					
	}
      
  
    }
?>