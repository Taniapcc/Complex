<?php

class LoginCambiar extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
   
    /** Aqui empieza los métodos */
  
    public function loginCambiar()
    {
        //llamar al metodo de la clase View
        $data['tag_page'] = "Cambiar Password -  Tienda Virtual ";
        $data['page_title'] = "Cambiar Password - <small> Tienda Virtual </small>";
        $data['page_name'] = "Cambiar Password";
        $data['datos'] = "";        
        //llamado a la vista
        $this->views->getViews($this, "loginCambiar", $data);
    }

    public function mostrarCambiar($id){       
        $data = $this->model->mostrar($id);              
        dep($data);
   }
    
      
     public function cambiar($datos)
    {
        $errores = array();

        if ($_SERVER['REQUEST_METHOD']=="POST") {

            $id = isset($_POST['id'])?strClean($_POST['id']):"";
            $clave1 = isset($_POST['clave1'])?strClean($_POST['clave1']):"";
            $clave2 = isset($_POST['clave2'])?strClean($_POST['clave2']):"";

             /** 
             * Validar datos formulario en BD MysQL
             * **/  
             
            if ($clave1=="") {
                array_push($errores,"El password es requerido");
               }
            if ($clave2=="") {
                array_push($errores,"Confirmar password es requerido");
               } 

            if ($clave2 != $clave1) {
                array_push($errores,"Los passwords no coinciden");
             }

             if (count($errores)==0){
            
                //dep($errores);
               
                $r = $this->model->cambiarClave($id,$clave1);
                //dep($r);

                if ($r) {
                        
                        $data['tag_page'] = "Cambio de Clave  ";
                        $data['page_title'] = "Cambio de clave <small> Tienda Virtual </small>";
                        $data['page_name'] = "Cambio de clave";
                        $data['color'] = "bg-primary";
                        $data['classbtn'] = "btn btn-primary";
                        $data['name_boton'] = "Regresar";
                        $data['url'] = base_url()."/Login";
                        $data['texto'] = "Se ha cambiado su password exitosamente. Bienvenido Nuevamente";
                       
                        $this->views->getViews( $this, "mensaje", $data);
                 }

                else{
                    array_push($errores,"El correo electrónico no existe en la base de datos");
                    $data['tag_page'] = "Error  ";
                    $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                    $data['page_name'] = "Error";
                    $data['color'] = "bg-danger";
                    $data['classbtn'] = "btn btn-danger";
                    $data['name_boton'] = "regresar";
                    $data['url'] = base_url()."/LoginRegistro";
                    $data['texto'] = "Existió un problema en su cambio Password. Prueba por favor más tarde o comuníquese a nuestro servicio de soporte técnico..";
                    
                    $this->views->getViews($this, "mensaje", $data);
                        

                }






             }else{
                /* Errorres*/

                print "errores";
                $data['tag_page'] = "Cambiar Password ";
                $data['page_title'] = "Cambiar Password- <small> Tienda Virtual </small>";
                $data['page_name'] = "Cambiar Password";
                $data['errores'] = $errores;
                $data['datos'] = $datos;
                //llamado a la vista              
                $this->views->getViews($this, "loginCambiar", $data);
             }

        }else{
             //llamar al metodo de la clase View
             $data['tag_page'] = "Cambiar Password -  Tienda Virtual ";
             $data['page_title'] = "Cambiar Password - <small> Tienda Virtual </small>";
             $data['page_name'] = "Cambiar Password";
             $data['datos'] = $datos;
            
             //llamado a la vista
             $this->views->getViews($this, "loginCambiar", $data);
 
        }//server  
        
    }


}
?>