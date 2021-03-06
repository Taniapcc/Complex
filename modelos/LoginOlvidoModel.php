<?php
   class LoginOlvidoModel extends Mysql
   {
       public function __construct()
       {
           parent::__construct();
       }

       function listar()
       {
           $sql = "SELECT * FROM usuario WHERE  tipousuario = 'Anonimo' AND condicion = 1";         
           $request = $this->select_all($sql);
           return $request;
       }

         function mostrar($id)
       {
           $sql="SELECT * FROM usuario where tipousuario = 'Anonimo' AND idusuario = '$id'";
           $request = $this->select($sql);
           return $request;
       }

       function infoCorreo($email)
       {
           $sql="SELECT * FROM usuario where tipousuario = 'Anonimo' AND email = '$email'";
           $request = $this->select($sql);
           return $request;
       }

       function validaCorreo($email)
       {
           //Si no existe correo pongo verdadero //
           $sql = "SELECT * FROM usuario WHERE tipousuario = 'Anonimo' AND email= '$email'";
           dep($sql);
           $rows = $this->queryRows($sql);
          
           return $rows;
       }

       function enviarCorreo($email){
        
         $data = $this->infoCorreo($email);                                                
        $idusuario = $data['idusuario'];
        $email = $data['email'];
        $nombre = $data['nombre'];
        $msg  = $nombre. " favor ingrese al siguiente link para cambiar tu clave de acceso <br>" ;
        $msg  .= "<a href='".base_url()."/loginOlvido/cambiaclave/".$idusuario."'> Cambia tu clave de acceso</a>";

         // datos información enviar al correo                                      
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type:text/html; charset=UTF-8\r\n"; 
        $headers .= "From: Ecolac\r\n"; 
        $headers .= "Repaly-to: administrador@tiendavirtual.com\r\n";
        $asunto = "Cambiar clave de acceso";  

        //dep($data);
        
        return @mail($email,$asunto, $msg, $headers);
           
    
      }
   }