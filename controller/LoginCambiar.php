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
        
   }

   public function validaId($id){       
    $data = $this->model->validaId($id);   
    }

    public function cambiarClaveAccesso($id,$clave){       
        $data = $this->model->cambiarClaveAccesso($id,$clave);   
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
                print ("Bien dddddd");


                if ($this->validaId($id,$clave1) != 0 ){

                    print "actualizacion exitosa";

                }else{

                    print "hubo un error";
                }





             }else{
                /* Errorres*/
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