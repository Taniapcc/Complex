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
           //$request = $this->select($sql);
           $request = $this->ejecutarConsultaSimpleFila($sql);
           return $request;
       }

       function mostrar( $id)
       {
          $sql="SELECT * FROM usuario where idusuario = '$id'";
          // $request = $this->select($sql);
          $request = $this->ejecutarConsultaSimpleFila($sql);
          return $request;
       }

       function editar ($data){

           $fecha = date("Y-m-d H:i:s");
           $nombre = $data["nombre"];
           $cedula = $data["cedula"];           
           $direccion = $data["direccion"];
           $telefono = $data["telefono"];
           $email = $data["email"];
           $codPostal = $data["codPostal"];
           $ciudad = $data["ciudad"] ;
           $idusuario = $data["idusuario"];
           
           if ($data["clave1"] !="") {
            if ($data["clave2"] !="") {
                $clave = hash_hmac("sha512", $data["clave1"], llave());
                $sql = "UPDATE usuario SET  
                    clave = '$clave'
                    WHERE idusuario = '$idusuario'";


                    $r1 = $this->ejecutarConsulta($sql);   
            }
            }  

           $sql = "UPDATE usuario SET  
                         nombre = '$nombre', 
                          cedula = '$cedula', 
                          direccion = '$direccion', 
                          telefono = '$telefono',
                          email = '$email',
                          codPostal = '$codPostal',
                          ciudad = '$ciudad',
                          login_dt = '$fecha',
                          cambio_dt = '$fecha'
                    WHERE idusuario = '$idusuario'";
            

          //dep ($sql);
             $r = $this->ejecutarConsulta($sql); 
             
            
         
           return $r;
       }

        function validaCorreo($email){
        $sql = "SELECT * FROM usuario WHERE email= '$email'";          
        $rows = $this->queryRows($sql);                  
        return ($rows>0)?true:false;
     }

     
     function validaLogin($login){
        $sql = "SELECT * FROM usuario WHERE tipousuario = 'Empleado' AND login ='".$login."'";
        $rows = $this->queryRows($sql);  
        return ($rows==0)?true:false;
      }  

     

     function insertar ($data){

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

       //Implementar un método para listar los registros
	 function listar()
     {
         $sql="SELECT idusuario,cedula,nombre,direccion,telefono,tipoUsuario,condicion FROM v_usuario";
         $request = $this->ejecutarConsultaMatriz($sql);
         return $request;					
     }


     function desactivar($id)
     {
       
        $sql=" UPDATE usuario SET condicion = 0
        WHERE idusuario = '$id' ";

         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }

     function activar($id)
     {
               
        $sql=" UPDATE usuario SET condicion = 1
        WHERE idusuario = '$id' ";
         $request = $this->ejecutarConsulta($sql);
         return $request;					
     }


       
    }
?>