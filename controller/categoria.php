<?php

class Categoria extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function categoria()
    {
        $data['tag_page'] = "Categoria -  Tienda Virtual ";
        $data['page_title'] = "Categoria - <small> Tienda Virtual </small>";
        $data['page_name'] = "categoria";
        //llamado a la vista
        $this->views->getViews($this, "categoria", $data);
    }




} 
     
?>



