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
        //llamar al metodo de la clase View
        $data['tag_page'] = "Bienvenido -  Tienda Virtual ";
        $data['page_title'] = "Bienvenido - <small> Tienda Virtual </small>";
        $data['page_name'] = "Bienvenido";
        $data['datos'] = "";        
        //llamado a la vista
        $this->views->getViews($this,"tienda", $data);
    }



}
?>