<?php

class LoginOlvido extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
   
    /** Aqui empieza los métodos */
  
    public function loginOlvido(){
         //llamar al metodo de la clase View
        $data['tag_page'] = "Recuperar Login -  Tienda Virtual ";
        $data['page_title'] = "Recuperar Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Recuperar Login";
        //llamado a la vista
        $this->views->getViews($this, "loginOlvido", $data);
    }

    public function listar(){
        $data = $this->model->listar();
        dep($data);
      
    }
    
    public function mostrarOlvido($id){       
        $data = $this->model->mostrar($id);              
        //dep($data);
   }

   public function infoCorreo($email){
        $data = $this->model->infoCorreo($email);
      // dep($data);
       return $data;
   }

   public function validaCorreo ($email){
       $data = $this->model->validaCorreo($email);
      //  dep($data);
        return $data;
  }

  public function enviarCorreo ($email){
    $data = $this->model->enviarCorreo($email);
     dep($data);
     return $data;
}

    function olvido(){
        $errores = array();

        if ($_SERVER['REQUEST_METHOD']=="POST") {
            /**
             *    Valida Errores
             */
            $errores = array(); 
            $email= isset($_POST["email"])? strClean($_POST["email"]) :"";
           // rescatar información del formulaio
            $data['email'] = $email;

             /** 
             * Validar datos en BD MysQL
             * **/  
            if ($email=="") {
              array_push($errores,"El email es requerido");
             }
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              array_push($errores,"El email electrónico no es válido");
             }
             

             if (count($errores)==0) {  

                  if ($this->model->validaCorreo($email) == 0) {
                    # code...
                    array_push($errores,"El correo electrónico no existe en la base de datos");
                    $data['tag_page'] = "Error  ";
                    $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                    $data['page_name'] = "Error";
                    $data['color'] = "bg-danger";
                    $data['classbtn'] = "btn btn-danger";
                    $data['name_boton'] = "regresar";
                    $data['url'] = base_url()."/LoginRegistro";
                    $data['texto'] = "Existió un problema al enviar el correo electrónico. Prueba por favor más tarde o comuníquese a nuestro servicio de soporte técnico..";
                    
                    $this->views->getViews($this, "mensaje", $data);

                  } // if valida correo
                  else {

                        $data = $this->enviarCorreo($email);                        
                      
                        $data['tag_page'] = "Cambio de Clave  ";
                        $data['page_title'] = "Cambio de clave <small> Tienda Virtual </small>";
                        $data['page_name'] = "Cambio de clave";
                        $data['color'] = "bg-primary";
                        $data['classbtn'] = "btn btn-primary";
                        $data['name_boton'] = "Regresar";
                        $data['url'] = base_url()."/Login";
                        $data['texto'] = "Se ha enviado un correo a <b>".$email."</b> para que puedas cambiar tu clave de acceso. Cualquier duda te puedes comunicar con nosotros. No olvides revisar tu bandeja de spam.";
                       
                        $this->views->getViews($this, "mensaje", $data);

                   
                  }// else valida correo
         

             } //  errores


        } // fin condicion if SERVER
        
        else {
          $data['tag_page'] = "Olvido Password  ";
          $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
          $data['page_name'] = "Olvido Password";
          $data['errores'] = $errores;
                  //llamado a la vista              
          $this->views->getViews($this,"loginOlvido", $data);


        } //fin  else SERVER
    
        
         if(count($errores)){      
          $data['tag_page'] = "Olvido Password  ";
          $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
          $data['page_name'] = "Olvido Password";
          $data['errores'] = $errores;
                  //llamado a la vista              
          $this->views->getViews($this,"loginOlvido", $data);
       }  // fin if errores


      
    }// fin olvido



      

}

?>