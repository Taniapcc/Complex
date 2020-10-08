<?php

class Roles extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function roles(){
        //llamar al metodo de la clase View
        $data['page_id'] = 3;
        $data['tag_page'] = "Roles Usuario";
        $data['page_title'] = "Roles Usuario <small> Tienda Virtual </small>";
        $data['page_name'] = "dashboard";
        //llamado a la vista      
        $this->views->getViews($this,"roles",$data);
    }


}

?>