<?php
# Controlador generico para 3 campos
class Carrito extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function carrito()
    {
        #
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...

        
            $data['tag_page'] = "Carrito -  Tienda Virtual ";
            $data['page_title'] = "Carrito - <small> Tienda Virtual </small>";
            $data['page_name'] = "Carrito";
            $data['card_title'] = "Listado de Carrito";

            # parametrización
            $data['name_view'] = "carrito"; //vista principal CONTROLLER LISTAR
            $data['name_table'] = "Carrito";
            $data['id_table']   = "idproducto";
            
            $this->views->getViews($this, $data['name_view'], $data);
        } else {
            # code...
            header("location:" . base_url() . "/Login");
        }
    }// productos


   


}   // fin clases    

                                

       