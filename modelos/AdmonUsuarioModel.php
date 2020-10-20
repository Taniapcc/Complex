<?php
    class AdmonUsuarioModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        function validaCorreo($email){
            $sql = "SELECT * FROM usuario WHERE tipousuario = 'Empleado' AND email='".$email."'";
            $rows = $this->queryRows($sql);   
            return ($rows==0)?true:false;
          }

         function validaLogin($login){
            $sql = "SELECT * FROM usuario WHERE tipousuario = 'Empleado' AND login ='".$login."'";
            $rows = $this->queryRows($sql);  
            return ($rows==0)?true:false;
          }  


        function alta($data){

          $r = false;
          if ($this->validaCorreo($data["email"])) {

            

                $clave = hash_hmac("sha512", $data["clave1"], llave());      
                $tienda =TIENDA;
                $cargo = 'Empleado';
                $tipoUsuario = 'Empleado';
                $fecha = date("Y-m-d H:i:s");

               
                $sql= "INSERT INTO usuario (nombre,  idtienda , cedula , direccion , telefono,  email,  cargo,  login,  clave,  codPostal,  tipoUsuario , ciudad, creado_dt,login_dt  ) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
                            $data["ciudad"],
                            $fecha,
                            $fecha                           
                             );
                $r = $this->insert($sql, $arrData); 
                                       
          } 
          return $r;




        }


    }