<?php

class LoginRegistro extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function loginRegistro(){
        //llamar al metodo de la clase View
        $data['page_id'] = 4;
        $data['tag_page'] = "Registrar Cuenta -  Tienda Virtual ";
        $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
        $data['page_name'] = "Registrar Cuenta";
        //llamado a la vista      
        $this->views->getViews($this,"register-user",$data);
    }

   

}

?>