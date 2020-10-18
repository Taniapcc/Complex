<?php
    class LoginRegistroModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        function insertar($data){
          
          $r = false;
          if ($this->validaCorreo($data["email"])) {
                $clave = hash_hmac("sha512", $data["clave1"], "clavesecreta");      
                $tienda =TIENDA;
                $cargo = 'Cliente';
                $tipoUsuario = 'Anonimo';

                $sql= "INSERT INTO usuario (nombre,  idtienda , cedula , direccion , telefono,  email,  cargo,  login,  clave,  codPostal,  tipoUsuario , ciudad  ) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

                $arrData = array($data["nombre"],
                            $tienda,
                            $data["cedula"],
  
                            $data["direccion"],
                            $data["telefono"],
                            $data["email"],
                            $cargo,
                            $data["login"],
                            $clave,
                            $data["codPostal"],                            
                            $tipoUsuario,
                            $data["ciudad"]);
                $r = $this->insert($sql, $arrData);     
                        
          } 
          return $r;
        }
      
       function validaCorreo($email){
          $sql = "SELECT * FROM usuario WHERE tipousuario = 'Anonimo' AND email='".$email."'";
          $rows = $this->queryRows($sql);          
          return ($rows==0)?true:false;
        }

        }
    
?>