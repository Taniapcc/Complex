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

    public function cambiar($datos)
    {
        $errores = array();
        if ($_SERVER['REQUEST_METHOD']=="POST") {

            $id = isset($_POST['id'])?strClean($_POST['id']):"";
            $clave1 = isset($_POST['clave1'])?strClean($_POST['clave1']):"";
            $clave2 = isset($_POST['clave2'])?strClean($_POST['clave2']):"";

            dep($id);
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

           

             if (count($errores)==0) {

                //array_push($errores,"El correo electrónico no existe en la base de datos");
                $data['tag_page'] = "Error  ";
                $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                $data['page_name'] = "Error";
                $data['color'] = "bg-danger";
                $data['classbtn'] = "btn btn-danger";
                $data['name_boton'] = "regresar";
                $data['url'] = base_url()."/LoginCambiar";
                $data['texto'] = "Existió un problema al enviar el correo electrónico. Prueba por favor más tarde o comuníquese a nuestro servicio de soporte técnico..";
                $data['datos'] = $datos;
                $this->views->getViews($this, "mensaje", $data);


            } else{
                // Si hay errores
                echo "si hay errores";
                $data['tag_page'] = "Cambiar Password  ";
                $data['page_title'] = "Cambiar Password - <small> Tienda Virtual </small>";
                $data['page_name'] = "Cambiar Password";
                $data['errores'] = $errores;
                $data['datos'] = $datos;
                //llamado a la vista              
                $this->views->getViews($this, "loginCambiar", $data);

           } 
        } //if server
        else{
            //llamar al metodo de la clase View
            $data['tag_page'] = "Cambiar Password -  Tienda Virtual ";
            $data['page_title'] = "Cambiar Password - <small> Tienda Virtual </small>";
            $data['page_name'] = "Cambiar Password";
            $data['datos'] = $datos;
            //llamado a la vista
            $this->views->getViews($this, "loginCambiar", $data);

        }//else server



    }
}
?>