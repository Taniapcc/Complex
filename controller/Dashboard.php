<?php

class Dashboard extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function dashboard(){
        //llamar al metodo de la clase View
        $data['page_id'] = 2;
        $data['tag_page'] = "Dashboard - Tienda Virtual";
        $data['page_title'] = "Dashboard - Tienda Virtual";
        $data['page_name'] = "dashboard";
        //llamado a la vista      
        $this->views->getViews($this,"dashboard",$data);
    }


}

?>