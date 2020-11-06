<?php
/**
 * Controlador Login
 */

class Tienda extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Tienda()
    {
        // Iniciar sesion
        $sesion = new Sesion();

            
        if ($sesion->getLogin()) {
            //llamar al metodo de la clase View
            //dep($sesion->getUsuario);
            $data['tag_page'] = "Bienvenido -  Tienda Virtual ";
            $data['page_title'] = "Bienvenido - <small> Tienda Virtual </small>";
            $data['page_name'] = "Bienvenido";

           
            $data['card_title'] = "Listado de Productos";

            # parametrización
            $data['name_view'] = "productos"; //vista principal CONTROLLER LISTAR
            $data['name_table'] = "Producto";
            $data['id_table']   = "idproducto";
           




            $data['datos'] = "";        
            //llamado a la vista
            $this->views->getViews($this,"tienda", $data);  
            //Destruccion de Sesion
            // session_destroy();
        } else {
            
             header("location:".base_url()."/Login");
            }        
    }






    


}
?>